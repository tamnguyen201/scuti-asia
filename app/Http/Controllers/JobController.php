<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Job;
use App\Model\Category;
use Illuminate\Support\Str;
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
    private $htmlSelectCategory;
    private $htmlSelectLocation;

    public function __construct(
    JobRepositoryInterface $jobRepository,
    CategoryRepositoryInterface $categoryRepository,
    LocationRepositoryInterface $locationRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->categoryRepository = $categoryRepository;
        $this->locationRepository = $locationRepository;
        $this->htmlSelectCategory = '';
        $this->htmlSelectLocation = '';
    }

    public function index()
    {
        $jobs = $this->jobRepository->paginate(10);
        return view("admin.job.index", compact('jobs'));
    }

    public function create()
    {
        $htmlOptionCategory = $this->getCategory();
        $htmlOptionLocation = $this->getLocation();
        return view("admin.job.create", compact('htmlOptionCategory','htmlOptionLocation'));
    }

    public function getCategory()
    {
        $data = $this->categoryRepository->all();
        foreach ($data as $value) {
            $this->htmlSelectCategory .= "<option value='" . $value['id'] . "'>"  . $value['category_name'] . "</option>";
        }
        return $this->htmlSelectCategory;
    }

    public function getLocation()
    {
        $data = $this->locationRepository->all();
        foreach ($data as $value) {
            $this->htmlSelectLocation .= "<option value='" . $value['id'] . "'>"  . $value['name'] . "</option>";
        }
        return $this->htmlSelectLocation;
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
        dd($dataCreate);
    }
}
