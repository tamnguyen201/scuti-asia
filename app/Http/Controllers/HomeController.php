<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ClientApplyJobRequest;
use App\Services\ApplyJobService;
use App\Repositories\Client\SectionRepositoryInterface;
use App\Repositories\Company\CompanyImagesRepositoryInterface;
use App\Repositories\Member\MemberRepositoryInterface;
use App\Repositories\Benefit\BenefitRepositoryInterface;
use App\Repositories\Company\ContactRepositoryInterface;
use App\Repositories\Company\NewSpaperRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Job\JobRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $SectionRepository;
    protected $MemberRepository;
    protected $BenefitRepository;
    protected $CompanyImagesRepository;
    protected $NewSpaperRepository;
    protected $CategoryRepository;
    protected $JobRepository;
    protected $ContactRepository;
    protected $ApplyJobService;

    public function __construct(
        SectionRepositoryInterface $SectionRepository,
        CompanyImagesRepositoryInterface $CompanyImagesRepository,
        MemberRepositoryInterface $MemberRepository,
        BenefitRepositoryInterface $BenefitRepository,
        NewSpaperRepositoryInterface $NewSpaperRepository,
        CategoryRepositoryInterface $CategoryRepository,
        JobRepositoryInterface $JobRepository,
        ContactRepositoryInterface $ContactRepository,
        ApplyJobService $ApplyJobService
    )
    {
        $this->SectionRepository = $SectionRepository;
        $this->CompanyImagesRepository = $CompanyImagesRepository;
        $this->MemberRepository = $MemberRepository;
        $this->BenefitRepository = $BenefitRepository;
        $this->CategoryRepository = $CategoryRepository;
        $this->NewSpaperRepository = $NewSpaperRepository;
        $this->JobRepository = $JobRepository;
        $this->ApplyJobService = $ApplyJobService;
    }

    public function index()
    {
        $data['section'] = $this->SectionRepository->all();
        $data['main_member'] = $this->MemberRepository->all();
        $data['benefits'] = $this->BenefitRepository->all();
        $data['working_environment'] = $this->CompanyImagesRepository->all();
        $data['new_spaper'] = $this->NewSpaperRepository->all();
        $data['categories'] = $this->CategoryRepository->where('status', '=', 1);
        $data['jobs'] = \App\Model\Job::where('status', 1)
                                ->whereHas('category', function ($query){
                                    $query->where('status', 1);
                                })->with(['category' => function($query){
                                    $query->where('status', 1);
                                }])->paginate(10);

        return view('client.page.index', compact('data'));
    }

    public function visit_us(ContactRequest $request)
    {
        $this->ContactRepository->create($request->all());

        return back()->with('success', trans('custom.alert_messages.success'));
    }

    public function jobSearch(Request $request)
    {
        if($request->category_id != '*'){
            $jobs = $this->JobRepository->jobSearchWithCategory($request->category_id, $request->keyword);
        } else {
            $jobs = $this->JobRepository->jobSearchWithCategories($request->keyword);
        }

        $html = view('client.page.jobSearch', compact('jobs'))->render();

        return response()->json($html);
    }

    public function filterJob(Request $request)
    {
        $categories = $this->CategoryRepository->where('status', '=', 1);
        
        if ($request->category_id != '*') {
            $categories = $this->CategoryRepository->where('id', '=',$request->category_id);
        }
        
        $html = view('client.page.filterJob', compact('categories'))->render();

        return response()->json($html);
    }

    public function jobDetail($id, $slug)
    {
        $job = $this->JobRepository->show($id);

        if($job->category->status == 1 && $job->status == 1 && $job->compareExpireDay()) {
            $data['job'] = $job;
            $data['related_job'] = $this->JobRepository->related($data['job']->category_id, $id);
    
            return view('client.page.jobDetail', compact('data'));
        }

        abort(404);
    }

    public function jobApply($id, $slug)
    {
        if (!auth()->check()) {
            $redirect = route('client.applied', [$id, $slug]);

            return redirect()->route('client.login')->with('redirect', $redirect);
        }

        $job = $this->JobRepository->show($id);

        if($job->category->status == 1 && $job->status == 1 && $job->compareExpireDay()) {
            $data['job'] = $job;
            $data['apply'] = \App\Model\UserJob::where('user_id', auth()->user()->id)->where('job_id', $id)->with('process')->first();
            $data['related_job'] = $this->JobRepository->related($data['job']->category_id, $id);

            return view('client.page.jobApply', compact('data'));
        }

        abort(404);
    }

    public function userApplyJob(ClientApplyJobRequest $request)
    {
        if (isset($request->cv_name) && auth()->user()->cv->count() == 3) {
            return response()->json(['status' => false, 'message' => trans('custom.alert_messages.warning_limit_cv')]);
        }

        $status = \App\Model\UserJob::where('user_id', \auth()->user()->id)->where('job_id', $request->job_id)->first();

        if($status == null) {
            $this->ApplyJobService->create($request->all());
            
            return response()->json(['status' => true]);
        }
        
        abort(404);
    }

    public function login()
    {
        return view('client.login');
    }

    public function profile()
    {
        return view('client.page.profile');
    }

    public function changePassword()
    {
        return view('client.page.changePassword');
    }
    
}
