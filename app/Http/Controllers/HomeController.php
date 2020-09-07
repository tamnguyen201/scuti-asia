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
        $data['benefits'] = $this->SectionRepository->where('slug', '=', 'benefits');
        $data['recruitment_flow'] = $this->SectionRepository->where('slug', '=', 'recruitment-flow');
        $data['working_environment'] = $this->CompanyImagesRepository->all();
        $data['about_us'] = $this->SectionRepository->where('slug', '=', 'about-us');
        $data['new_spaper'] = $this->NewSpaperRepository->all();
        $data['visit_us'] = $this->SectionRepository->where('slug', '=', 'visit-us');
        $data['categories'] = $this->CategoryRepository->all();
        $data['jobs'] = $this->JobRepository->with('category')->get();
        $data['hotJobs'] = $this->JobRepository->all();

        return view('client.page.index', compact('data'));
    }

    public function visit_us(ContactRequest $request)
    {
        $this->ContactRepository->create($request->all());

        return back()->with('success', trans('custom.alert_messages.success'));
    }

    public function jobs()
    {
        $data['recruitment_flow'] = $this->SectionRepository->where('slug', '=', 'recruitment-flow');
        $data['categories'] = $this->CategoryRepository->all();
        $data['jobs'] = $this->JobRepository->with('category')->paginate(5);

        return view('client.page.jobs', compact('data'));
    }

    public function jobDetail($slug, $id)
    {
        $data['job'] = $this->JobRepository->show($id);
        $data['related_job'] = $this->JobRepository->all();

        return view('client.page.jobDetail', compact('data'));
    }

    public function jobApply($slug, $id)
    {
        if (!auth()->check()) {
            $redirect = route('client.applied', [$slug, $id]);

            return redirect()->route('client.login')->with('redirect', $redirect);
        }

        $data['recruitment_flow'] = $this->SectionRepository->where('slug', '=', 'recruitment-low');
        $data['job'] = $this->JobRepository->show($id);

        return view('client.page.jobApply', compact('data'));
    }

    public function userApplyJob(ClientApplyJobRequest $request)
    {
        $this->ApplyJobService->create($request->all());
        alert(trans('custom.alert_messages.contact_alert.title'), trans('custom.alert_messages.contact_alert.text'), 'success');
        
        return back();
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
