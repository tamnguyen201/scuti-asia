<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ClientApplyJobRequest;
use App\Services\ApplyJobService;
use App\Repositories\Client\SectionRepositoryInterface;
use App\Repositories\Company\CompanyImagesRepositoryInterface;
use App\Repositories\Company\ContactRepositoryInterface;
use App\Repositories\Company\NewSpaperRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Job\JobRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $SectionRepository;
    protected $CompanyImagesRepository;
    protected $NewSpaperRepository;
    protected $CategoryRepository;
    protected $JobRepository;
    protected $ContactRepository;
    protected $ApplyJobService;

    public function __construct(
        SectionRepositoryInterface $SectionRepository,
        CompanyImagesRepositoryInterface $CompanyImagesRepository,
        NewSpaperRepositoryInterface $NewSpaperRepository,
        CategoryRepositoryInterface $CategoryRepository,
        JobRepositoryInterface $JobRepository,
        ContactRepositoryInterface $ContactRepository,
        ApplyJobService $ApplyJobService
    )
    {
        $this->SectionRepository = $SectionRepository;
        $this->CompanyImagesRepository = $CompanyImagesRepository;
        $this->CategoryRepository = $CategoryRepository;
        $this->NewSpaperRepository = $NewSpaperRepository;
        $this->JobRepository = $JobRepository;
        $this->ApplyJobService = $ApplyJobService;
    }

    public function index()
    {
        $data['section'] = $this->SectionRepository->all();
        $data['main_member'] = \App\Model\MainMember::all();
        $data['benefits'] = \App\Model\Benefit::all();
        $data['working_environment'] = $this->CompanyImagesRepository->all();
        $data['new_spaper'] = $this->NewSpaperRepository->all();
        $data['categories'] = $this->CategoryRepository->where('status', '=', 1);

        return view('client.page.index', compact('data'));
    }

    public function visit_us(ContactRequest $request)
    {
        $this->ContactRepository->create($request->all());

        return back()->with('success', trans('custom.alert_messages.success'));
    }

    public function jobs()
    {
        $data['recruitment_flow'] = $this->SectionRepository->show(10);
        $data['categories'] = $this->CategoryRepository->all();
        $data['jobs'] = $this->JobRepository->with('category')->paginate(5);

        return view('client.page.jobs', compact('data'));
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
            // $data['related_job'] = \App\Model\Job::where('category_id', $data['job']->category_id)->where('id', '<>', $id)->take(5);
            $data['related_job'] = $this->JobRepository->where('id', '<>', $id);
    
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
            // $data['related_job'] = \App\Model\Job::where('category_id', $data['job']->category_id)->where('id', '<>', $id)->take(5);
            $data['related_job'] = $this->JobRepository->where('id', '<>', $id);

            return view('client.page.jobApply', compact('data'));
        }

        abort(404);
    }

    public function userApplyJob(ClientApplyJobRequest $request)
    {
        $status = \App\Model\UserJob::where('user_id', \auth()->user()->id)->where('job_id', $request->job_id)->first();

        if($status == null) {
            $this->ApplyJobService->create($request->all());
            // alert(trans('custom.alert_messages.contact_alert.title'), trans('custom.alert_messages.contact_alert.text'), 'success');
            
            return true;

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

    public function changeAccountInfo()
    {
        return view('client.page.changeAccountInfo');
    }

    public function changePassword()
    {
        return view('client.page.changePassword');
    }
    
}
