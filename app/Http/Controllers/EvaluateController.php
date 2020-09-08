<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Redirect,Response;
use App\Model\Evaluate;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Repositories\Process\ProcessRepositoryInterface;
use App\Repositories\Evaluate\EvaluateRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class EvaluateController extends Controller
{
    

    protected $candidateRepository;
    protected $evaluateRepository;
    protected $processRepository;

    public function __construct(
        EvaluateRepositoryInterface $evaluateRepository,
        CandidateRepositoryInterface $candidateRepository,
        ProcessRepositoryInterface $processRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
        $this->candidateRepository = $candidateRepository;
        $this->processRepository = $processRepository;
    }

    public function checking($id, Request $request)
    {
        $this->evaluateRepository->create([
            'user_id'=>$id,
            'comment'=>$request->comment,
            'status'=>'checking'
        ]);
        return redirect()->route('candidates.index');
    }

    public function sendEmail($id)
    {
        $candidate = $this->candidateRepository->show($id);
        $html = view('admin.evaluate.email', compact('candidate'))->render();

        return response()->json($html);
    }

    public function showCalendar($id)
    {
        $events = [];
        $data = Event::all();
        // dd($data);
        $dataUser =$this->candidateRepository->show($id);
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end),
                    $value->id,
                    [
                        'color'=> $value->color
                    ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events)
        ->setOptions([ 
            'editable' => true,
            'selectable'=> true,
            'selectHelper'=> true,
            'displayEventTime'=> true,
        ]) 
        ->setCallbacks([ 
            'dayClick' => 'function(date, event, view) {
                $("#dialog").dialog({
                    title:"Add Event",
                    width:600,
                    height:500,
                    modal:true,
                    show:{effect: "clip", duration: 350},
                    hide:{effect: "clip", duration: 250},
                  })
            }'
        ]);

        return $calendar;
    }


    public function storeCalendar(Request $request)
    {  
        $insertArr = [ 
            'user_id' => $request->id,
            'note' => $request->note,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color
        ];
        $event = Event::updateOrCreate($insertArr);

        return redirect()->route('evaluate.candidate.show',$request->process_id);
    }
     
    public function show($id)
    {
        $processById = $this->processRepository->show($id);
        $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
        $calendar = $this->showCalendar($candidateById->id);
        $dataUser =$this->candidateRepository->show($candidateById->id);
        $data = Event::all();
        
        return view('admin.evaluate.evaluate_process', compact('processById','data','candidateById','calendar','dataUser'));
    }

    public function store(Request $request, $id)
    {
        $dataCurrentEvaluate = Evaluate::create([
            'process_step_id' =>$id,
            'comment' =>$request->comment,
            'status' =>1
        ]);
        if($dataCurrentEvaluate['status'] == 1 ){
            $processById = $this->evaluatePass($dataCurrentEvaluate);
            $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
            $calendar = $this->showCalendar($candidateById->id);
            $dataUser =$this->candidateRepository->show($candidateById->id);
            $data = Event::all();

            return view('admin.evaluate.evaluate_process' , compact('processById','data','candidateById','calendar','dataUser'));
        }
    }

    public function evaluatePass( $dataEvaluate ) {
        $currentProcessId = $dataEvaluate->process_step_id;
        $currentProcess = $this->processRepository->show( $currentProcessId );
        if (0 < $currentProcess->step && $currentProcess->step < 4 ) {
            $nextProcessStep = ( $currentProcess->step ) +1;
            if( $nextProcessStep == 2 ){
                $nextProcessName = 'Review';
            }else if( $nextProcessStep== 3 ) {
                $nextProcessName = 'Interview';
            } else if( $nextProcessStep== 4 ) {
                $nextProcessName = 'Hired';
            };
            $dataNextProcess = $this->processRepository->create([
                'step'=>$nextProcessStep,
                'name'=> $nextProcessName,
                'user_job_id' =>$currentProcess->user_job_id
            ]);
        }
    
        return $dataNextProcess;
    } 

    public function startEvaluate($id)
    {
        $this->processRepository->create([
            'step'=>1,
            'name'=> 'Checking',
            'user_job_id' =>$id
        ]);

        return redirect()->back();
    }
}
