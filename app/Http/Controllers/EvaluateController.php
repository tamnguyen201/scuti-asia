<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Redirect,Response;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Repositories\Evaluate\EvaluateRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;


class EvaluateController extends Controller
{
    

    protected $candidateRepository;
    protected $evaluateRepository;

    public function __construct(
        EvaluateRepositoryInterface $evaluateRepository,
        CandidateRepositoryInterface $candidateRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
        $this->candidateRepository = $candidateRepository;
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
        return view('admin.evaluate.calendar', compact('data','calendar','dataUser'));
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
        return redirect()->back();
    }
     

}
