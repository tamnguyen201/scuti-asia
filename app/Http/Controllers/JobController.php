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

class JobController extends Controller
{
    protected $jobRepository;
    protected $categoryRepository;
    protected $locationRepository;

    public function __construct(
        JobRepositoryInterface $jobRepository,
        CategoryRepositoryInterface $categoryRepository,
        LocationRepositoryInterface $locationRepository 
    ) {
        $this->jobRepository = $jobRepository;
        $this->categoryRepository = $categoryRepository;
        $this->locationRepository = $locationRepository;
    }

    public function index()
    {
        $jobs = $this->jobRepository->paginate(10);
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
            'description' => $request->description
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
        return view("admin.job.detail", compact('jobById'));
    }
}
