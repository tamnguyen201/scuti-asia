<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function login() 
    {
        if (!auth()->check()) {
            return redirect()->route('admin.home');
        }

        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        //Validate form input
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        //Custom errors
        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email invalidate',
            'password.required' => 'Password is required'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
            $remember = $request->has('remember_me') ? true : false;
            $email = $request->input('email');
            $password = $request->input('password');
        if (Auth::attempt(['email' => $email,'password' => $password], $remember)) {
            return redirect()->route('admin.home');
        }
        Session::flash('error', 'Email or password invalidate');
        return redirect()->route('login');
    }

    public function forgot()
    {
        return view('admin.auth.forgotPw');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
