<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() 
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
        return view('client.auth.login');
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

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

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
