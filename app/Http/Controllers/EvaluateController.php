<?php

namespace App\Http\Controllers;

use App\Model\Event;
use Redirect,Response;
use App\Model\Evaluate;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\EvaluateRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FailEvaluateRequest;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Repositories\Process\ProcessRepositoryInterface;
use App\Repositories\Evaluate\EvaluateRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;


class EvaluateController extends Controller
{
    

    protected $candidateRepository;
    protected $evaluateRepository;
    protected $processRepository;
    protected $adminRepository;
    protected $jobRepository;

    public function __construct(
        EvaluateRepositoryInterface $evaluateRepository,
        CandidateRepositoryInterface $candidateRepository,
        ProcessRepositoryInterface $processRepository,
        AdminRepositoryInterface $adminRepository,
        JobRepositoryInterface $jobRepository)
    {
        $this->evaluateRepository = $evaluateRepository;
        $this->candidateRepository = $candidateRepository;
        $this->processRepository = $processRepository;
        $this->adminRepository = $adminRepository;
        $this->jobRepository =$jobRepository;
    }

    public function startEvaluate($id)
    {
        $this->processRepository->updateOrCreate([
            'step'=>1,
            'name'=> 'Đang kiểm tra',
            'user_job_id' =>$id
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        
        $processById = $this->processRepository->show($id);
        $allProcess = $this->processRepository->where('user_job_id', '=', $processById->user_job_id)->all();
        $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
        $jobById = $this->jobRepository->show($processById->user_job->job_id);
        $calendar = $this->showCalendar($candidateById->id);
        $dataUser =$this->candidateRepository->show($candidateById->id);
        $data = Event::where('user_id', $candidateById->id)->get();
        
        return view('admin.evaluate.evaluate_process', compact('allProcess','processById','data','candidateById','calendar','dataUser','jobById'));
    }

    public function store(EvaluateRequest $request, $id)
    {
        $dataCurrentEvaluate = Evaluate::create([
            'process_id' => $id,
            'comment' => $request->comment,
            'status' => ($request->status) ? 1 : 0,
        ]);
        if($dataCurrentEvaluate['status'] == 1 ){
            $processById = $this->evaluatePass($dataCurrentEvaluate);
            $allProcess = $this->processRepository->where('user_job_id', '=', $processById->user_job_id)->all();
            
            $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
            $jobById = $this->jobRepository->show($processById->user_job->job_id);
            $calendar = $this->showCalendar($candidateById->id);
            $dataUser =$this->candidateRepository->show($candidateById->id);
            $dataAdmin = $this->adminRepository->all();
            $data = Event::where('user_id', $candidateById->id)->get();
            // $color = Config::get('common.color');
            

            return view('admin.evaluate.evaluate_process' , compact('allProcess','processById','data','candidateById','calendar','dataUser','dataAdmin','jobById'));
        } else {
            $processById = $this->evaluateFail($dataCurrentEvaluate);

            $allProcess = $this->processRepository->where('user_job_id', '=', $processById->user_job_id)->all();
            $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
            $jobById = $this->jobRepository->show($processById->user_job->job_id);
            $calendar = $this->showCalendar($candidateById->id);
            $dataUser =$this->candidateRepository->show($candidateById->id);
            $dataAdmin = $this->adminRepository->all();
            $data = Event::where('user_id', $candidateById->id)->get();

            return view('admin.evaluate.evaluate_process' , compact('allProcess','processById','data','candidateById','calendar','dataUser','dataAdmin','jobById'));
        }
    }

    public function showCalendar($id)
    {
        $events = [];
        
        $data = Event::all();
        $dataUser =$this->candidateRepository->show($id);
        
        if($data->count()) {
            foreach ($data as $key => $value) {
                $attender_id = json_decode($value->admin_id) ;
                $str_attender_name=[];
                foreach ($attender_id as $id) {
                    $str_attender_name_id = $this->adminRepository->show($id)->name;
                    array_push($str_attender_name, $str_attender_name_id);
                };
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.' +1 day'),
                    $value->id,
                    [
                        'color'=> $value->color,
                        'admins'=>$str_attender_name,
                        'start_time'=> \Carbon\Carbon::parse($value->start)->format('d/m/Y - H:i')
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
                event.preventDefault();
                let url = $("#btn-add").attr("href");
                $.get(url)
                .done(function (results) {
                $(".modal-body").html(results);
                $("#modal_add").modal("show");
                }).fail(function (data) {
                });
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
                }', 
            ]);

        return $calendar;
    }

    public function createCalendar($id){
        $processById = $this->processRepository->show($id);
        $candidateById = $this->candidateRepository->where('id','=', $processById->user_job->user_id);
        $dataUser =$this->candidateRepository->show($candidateById->id);
        $dataAdmin = $this->adminRepository->all();
        $html = view('admin.calendar.modal_add', compact('processById','dataUser','dataAdmin'))->render();
        return response()->json($html);
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
    }

    public function evaluatePass( $dataEvaluate ) {
        $currentProcessId = $dataEvaluate->process_id;
        $currentProcess = $this->processRepository->show( $currentProcessId );
        if (0 < $currentProcess->step && $currentProcess->step < 4 ) {
            $nextProcessStep = ( $currentProcess->step ) +1;
            if( $nextProcessStep == 1 ){
                $nextProcessName = 'Đang kiểm tra';
            }else if( $nextProcessStep== 2 ) {
                $nextProcessName = 'Phỏng vấn';
            } else if( $nextProcessStep== 3 ) {
                $nextProcessName = 'Kết thúc';
            };
            $dataNextProcess = $this->processRepository->updateOrCreate([
                'step'=>$nextProcessStep,
                'name'=> $nextProcessName,
                'user_job_id' =>$currentProcess->user_job_id
            ]);
        }
    
        return $dataNextProcess;
    } 

    public function evaluateFail( $dataEvaluate ) {
        $currentProcessId = $dataEvaluate->process_id;
        $currentProcess = $this->processRepository->show( $currentProcessId );
        $dataNextProcess = $this->processRepository->updateOrCreate([
            'step'=>4,
            'name'=> 'Ứng viên bị loại',
            'user_job_id' =>$currentProcess->user_job_id
        ]);

        return $dataNextProcess;
    }

    public function createEmail(Request $request)
    {
        $candidate_email = $request->email;
        $time = $request->time;
        $name = $request->name;
        $event_id = $request->event_id;
        $jobName = $request->job;
        $process_id = $request->process;

        $this->evaluateRepository->sendEmail($candidate_email, $time, $name, $jobName);
        Event::find($event_id)->update(['email_status'=>1]);

        return redirect()->route('evaluate.candidate.show', $process_id);
    }

    public function destroyCalendar($id){
        Event::find($id)->delete();

        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }

    public function editCalendar($id)
    {
        $event = Event::find($id);
        $admins = json_decode($event->admin_id);
        $dataAdmin = $this->adminRepository->all();
        
        $html = view('admin.calendar.modal_edit', compact('event','admins','dataAdmin'))->render();
        
        return response()->json($html);
    }

    public function updateCalendar(EventUpdateRequest $request, $id)
    { 
        $insertArr = [ 
            'note' => $request->note,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'admin_id'=>$request->admins
        ];

        return Event::find($id)->update($insertArr);
    }


    public function createFailEmail(Request $request)
    {
        $process_id = $request->process_id;
        $candidate_email = $request->email;
        $name = $request->name;
        $jobName= $request->job;
        $reason = $request->reason;
        $validator = Validator::make($request->all(), [
            'reason' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('error', trans('custom.alert_messages.reason_required'));
            return redirect()->route('evaluate.candidate.show', $process_id);
        } else {
            $this->evaluateRepository->sendFailEmail($candidate_email, $name, $jobName, $reason);

            return redirect()->route('admin.home');
        }
        
    }

    public function createPassEmail(Request $request)
    {
        $process_id = $request->process_id;
        $candidate_email = $request->email;
        $name = $request->name;
        $jobName= $request->job;
        $reason = $request->reason;
        $validator = Validator::make($request->all(), [
            'reason' => 'required'
        ]);
        if ($validator->fails()) {
            Session::flash('error', trans('custom.alert_messages.content_required'));
            return redirect()->route('evaluate.candidate.show', $process_id);
        } else {
            $this->evaluateRepository->sendPassEmail($candidate_email, $name, $jobName, $reason);

            return redirect()->route('admin.home');
        }
        
    }
   
}
