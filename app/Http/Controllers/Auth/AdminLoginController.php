<?php

namespace App\Http\Controllers\Auth;

use Route;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function login() 
    {   
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt(['email' => $email,'password' => $password], $remember)) {
            
            return redirect()->intended('/admin');
        }
        Session::flash('error', trans('custom.alert_messages.invalid'));
        return redirect()->route('admin.login');
    }

    public function forgot()
    {
        return view('admin.auth.forgot_password');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        
        return redirect()->route('admin.login');
    }
}
