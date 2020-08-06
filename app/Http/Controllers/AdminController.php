<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.staff.index');
    }

    public function login()
    {
        return view('admin.auth.login');
    }

    public function forgot()
    {
        return view('admin.auth.forgotPw');
    }

}
