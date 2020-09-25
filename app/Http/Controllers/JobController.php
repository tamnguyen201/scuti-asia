<?php

namespace App\Http\Controllers;

use App\Model\Job;
use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\JobRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Repositories\Job\JobRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Locations\LocationRepositoryInterface;
use App\Repositories\Candidate\CandidateRepositoryInterface;

class JobController extends Controller
{
    protected $jobRepository;
    protected $categoryRepository;
    protected $candidateRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        CategoryRepositoryInterface $categoryRepository,
        LocationRepositoryInterface $locationRepository,
        CandidateRepositoryInterface $candidateRepository
    ) {
        $this->jobRepository = $jobRepository;
        $this->categoryRepository = $categoryRepository;
        $this->locationRepository = $locationRepository;
        $this->candidateRepository = $candidateRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->paginate();
        return view("admin.job.index", compact('jobs'));
    }

    public function create()
    {
        $dataCategory = $this->categoryRepository->all();
        $dataLocation = $this->locationRepository->all();

        return view("admin.job.create", compact('dataCategory', 'dataLocation'));
    }

    public function store(JobRequest $request)
    {
        $dataCreate = $this->jobRepository->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'slug' => Str::slug($request->name),
            'expireDay' => $request->expire_date,
            'description' => $request->description,
            'content'=> $request->content,
            'salary'=>$request->salary
        ]);

        return redirect()->route('jobs.index');
    }

    public function updateStatus(Request $request)
    {
        $job = $this->jobRepository->show($request->job_id);
        $job->status = $request->status;
        $job->save();

        return response()->json(['success' => config('common.alert_messages.success')]);
    }

    public function detail($id)
    {
        $jobById = $this->jobRepository->show($id);
        $candidates = $this->candidateRepository->indexByJob($id);
        return view("admin.job.detail", compact('jobById','candidates'));
    }

    public function edit($id)
    {
        $jobById = $this->jobRepository->show($id);
        $dataCategory = $this->getSelectedCategory();
        $dataLocation = $this->getSelectedLocation();

        return view('admin.job.edit', compact('jobById', 'dataCategory', 'dataLocation'));
    }

    public function getSelectedCategory()
    {
        $dataCategory = $this->categoryRepository->all();
        return $dataCategory;
    }

    public function getSelectedLocation()
    {
        $dataLocation = $this->locationRepository->all();
        return $dataLocation;
    }

    public function update(JobUpdateRequest $request, $id)
    {
        $this->jobRepository->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'expireDay' => $request->expire_date,
            'description' => $request->description,
            'content'=> $request->content,
            'salary'=>$request->salary
        ], $id);

        return redirect()->route('jobs.index');
    }

    public function search(Request $request)
    {
        $jobs = \App\Model\Job::where('name', 'like', '%'.$request->keyword.'%')
                                    ->where('status', '=', 1)
                                    ->paginate(10);
        $html = view('admin.job.search', compact('jobs'))->render();

        return response()->json($html);
    }
}
