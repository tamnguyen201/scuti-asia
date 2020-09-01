<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Redirect,Response;
use Illuminate\Http\Request;
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

    public function showCalendar(){

        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
       return view('admin.evaluate.calendar');
    }

    public function storeCalendar(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                    //    'start' => $request->start,
                    //    'end' => $request->end
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function updateCalendar(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroyCalendar(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
   
        return Response::json($event);
    }    
}
