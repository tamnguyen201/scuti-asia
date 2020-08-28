<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Requests\CompanyRequest;
use App\Repositories\Company\CompanyRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $a;

    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->a = $repository;
    }

    public function index()
    {
        $data['benefits'] = 1;
        $data['recruitment_flow'] = 1;
        $data['working_environment'] =1;
        $data['about_us'] = 1;
        $data['new_spaper'] = \App\Model\Category::all();
        $data['categories'] = \App\Model\Category::all();
        $data['jobs'] = \App\Model\Job::with('category')->get();
        $data['hotJobs'] = \App\Model\Job::all();

        return view('client.page.index', compact('data'));
    }

    public function jobs()
    {
        $data['categories'] = \App\Model\Category::all();
        $data['jobs'] = \App\Model\Job::with('category')->paginate(5);

        return view('client.page.jobs', compact('data'));
    }

    public function jobDetail($slug, $id)
    {
        $data['job'] = \App\Model\Job::find($id);

        return view('client.page.jobDetail', compact('data'));
    }

    public function jobApply($slug, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $data['job'] = \App\Model\Job::find($id);

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

    public function profile2()
    {
        return view('client.page.changeAccountInfo');
    }

    public function profile3()
    {
        return view('client.page.changePassword');
    }
    
}
