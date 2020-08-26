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
