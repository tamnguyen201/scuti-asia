<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use Illuminate\Http\Request;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class CandidateController extends Controller
{
    protected $candidateRepository;

    public function __construct(
        CandidateRepositoryInterface $candidateRepository,
        JobRepositoryInterface $jobRepository 
    ) {
        $this->candidateRepository = $candidateRepository;
        $this->jobRepository = $jobRepository;
    }

    public function index()
    {
        $candidates = $this->candidateRepository->index();

        return view("admin.job.detail", compact('candidates'));
    }

    public function evaluating()
    {
        $candidates = $this->candidateRepository->evaluating();

        return view("admin.candidate.evaluating", compact('candidates'));
    }

    public function finish()
    {
        $candidates = $this->candidateRepository->finish();

        return view("admin.candidate.finish", compact('candidates'));
    }

    public function failed()
    {
        $candidates = $this->candidateRepository->failed();

        return view("admin.candidate.failed", compact('candidates'));
    }

    public function show($id)
    {
        $candidate = $this->candidateRepository->show($id);
        $html = view('admin.candidate.profile', compact('candidate'))->render();

        return response()->json($html);
    }

    public function create()
    {
        return view('admin.candidate.add');
    }

    public function store(CandidateRequest $request)
    {
        $this->candidateRepository->create($request->all());
        
        return redirect()->route('job.detail', $request->job_id)->with('success', trans('custom.alert_messages.success'));
    }

    public function search(Request $request)
    {
        $candidates = \App\Model\UserJob::where('job_id', $request->job_id)
                        ->whereHas('user', function ($query) use ($request){
                            $query->where('name', 'like', '%'.$request->keyword.'%');
                        })->with(['user' => function($query) use ($request){
                            $query->where('name', 'like', '%'.$request->keyword.'%');
                        }])->paginate(10);
        $html = view('admin.candidate.list', compact('candidates'))->render();

        return response()->json($html);
    }

    public function showByJob($id)
    {
        $candidates = $this->candidateRepository->indexByJob($id);
        
        return view('admin.candidate.index', compact('candidates'));
    }
}
