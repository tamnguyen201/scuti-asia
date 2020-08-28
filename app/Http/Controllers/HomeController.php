<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.page.index');
    }

    public function jobs()
    {
        $data['categories'] = \App\Model\Category::all();
        $data['jobs'] = \App\Model\Job::with('category')->paginate(10);

        return view('client.page.jobs', compact('data'));
    }

    public function jobDetail($slug, $id)
    {
        $data['job'] = \App\Model\Job::find($id);

        return view('client.page.jobDetail', compact('data'));
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
