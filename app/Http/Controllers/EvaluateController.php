<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Redirect,Response;
use App\Model\Evaluate;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Repositories\Process\ProcessRepositoryInterface;
use App\Repositories\Evaluate\EvaluateRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;

class EvaluateController extends Controller
{
    

    protected $candidateRepository;
    protected $evaluateRepository;
    protected $processRepository;
    protected $adminRepository;

    public function __construct(
        EvaluateRepositoryInterface $evaluateRepository,
        CandidateRepositoryInterface $candidateRepository,
        ProcessRepositoryInterface $processRepository,
        AdminRepositoryInterface $adminRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
        $this->candidateRepository = $candidateRepository;
        $this->processRepository = $processRepository;
        $this->adminRepository = $adminRepository;
    }

    public function showCalendar($id)
    {
        $events = [];
        
        $data = Event::all();
        $dataUser =$this->candidateRepository->show($id);
        
        if($data->count()) {
            foreach ($data as $key => $value) {
                $attender_id = json_decode($value->admin_id) ;
                $attender_names=[];
                for ($i=0; $i < count($attender_id) ; $i++) { 
                    $attender_name[$i] = $this->adminRepository->show($attender_id[$i])->name;
                };
                $str_attender_name = implode(',',$attender_name);
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.' +1 day'),
                    $value->id,
                    [
                        'color'=> $value->color,
                        'admins'=>$str_attender_name,
                        'start_time'=> \Carbon\Carbon::parse($value->start)->format('d/m/Y - H:i:s')
                    ],
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
                $("#modal_add").modal("show");
            }',
            'eventRender' => 'function(event, element) {
                element.popover({
                  animation: true,
                  html: true,
                  title: $(element).html(),
                  content: function(){
                      return `
                        <div>
                            <p style="color:red">Admin tham dự: ${event.admins}</p>
                            <p>Thời gian: ${(event.start_time)}</p>
                        </div>
                      `;
                  },
                  trigger: "hover",
                  placement: "bottom",
                  container: "body"
                  });
                }'
        ]);

        return $calendar;
    }


    public function storeCalendar(EventRequest $request)
    {  
        $insertArr = [ 
            'user_id' => $request->id,
            'note' => $request->note,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color,
            'admin_id'=>$request->admins
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
        $dataAdmin = $this->adminRepository->all();
        $data = Event::all();
        
        return view('admin.evaluate.evaluate_process', compact('processById','data','candidateById','calendar','dataUser','dataAdmin'));
    }

    public function store(Request $request, $id)
    {
        $dataCurrentEvaluate = Evaluate::create([
            'process_id' =>$id,
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
        $currentProcessId = $dataEvaluate->process_id;
        $currentProcess = $this->processRepository->show( $currentProcessId );
        if (0 < $currentProcess->step && $currentProcess->step < 4 ) {
            $nextProcessStep = ( $currentProcess->step ) +1;
            if( $nextProcessStep == 1 ){
                $nextProcessName = 'Checking';
            }else if( $nextProcessStep== 2 ) {
                $nextProcessName = 'Interview';
            } else if( $nextProcessStep== 3 ) {
                $nextProcessName = 'Finish';
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

    public function createEmail()
    {
        return view('admin.evaluate.email');
    }
}
