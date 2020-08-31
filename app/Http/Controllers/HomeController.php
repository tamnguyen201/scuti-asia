<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\CompanyRequest;
use App\Repositories\Client\SectionRepositoryInterface;
use App\Repositories\Company\CompanyImagesRepositoryInterface;
use App\Repositories\Company\PartnerCompaniesRepositoryInterface as NewSpaperRepositoryInterface;
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

    public function __construct(
        SectionRepositoryInterface $SectionRepository,
        CompanyImagesRepositoryInterface $CompanyImagesRepository,
        NewSpaperRepositoryInterface $NewSpaperRepository,
        CategoryRepositoryInterface $CategoryRepository,
        JobRepositoryInterface $JobRepository
    )
    {
        $this->SectionRepository = $SectionRepository;
        $this->CompanyImagesRepository = $CompanyImagesRepository;
        $this->CategoryRepository = $CategoryRepository;
        $this->NewSpaperRepository = $NewSpaperRepository;
        $this->JobRepository = $JobRepository;
    }

    public function index()
    {
        $data['benefits'] = $this->SectionRepository->where('field', '=', 'benefits');
        $data['recruitment_flow'] = $this->SectionRepository->where('field', '=', 'recruitment_flow');
        $data['working_environment'] = $this->CompanyImagesRepository->all();
        $data['about_us'] = $this->SectionRepository->where('field', '=', 'about_us');
        $data['new_spaper'] = $this->NewSpaperRepository->all();
        $data['visit_us'] = $this->SectionRepository->where('field', '=', 'visit_us');
        $data['categories'] = $this->CategoryRepository->all();
        $data['jobs'] = $this->JobRepository->with('category')->get();
        $data['hotJobs'] = $this->JobRepository->all();

        return view('client.page.index', compact('data'));
    }

    public function jobs()
    {
        $data['recruitment_flow'] = $this->SectionRepository->where('field', '=', 'recruitment_flow');
        $data['categories'] = $this->CategoryRepository->all();
        $data['jobs'] = $this->JobRepository->with('category')->paginate(5);

        return view('client.page.jobs', compact('data'));
    }

    public function jobDetail($slug, $id)
    {
        $data['job'] = $this->JobRepository->show($id);

        return view('client.page.jobDetail', compact('data'));
    }

    public function jobApply($slug, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('client.login');
        }

        $data['recruitment_flow'] = $this->SectionRepository->where('field', '=', 'recruitment_flow');
        $data['job'] = $this->JobRepository->show($id);

        return view('client.page.jobApply', compact('data'));
    }

    public function userApplyJob(CompanyRequest $request)
    {
        
        return back()->with('success', trans('custom.alert_messages.success'));
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
