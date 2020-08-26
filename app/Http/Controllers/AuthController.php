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
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember)) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('login')->with('error', 'Email or password invalidate');
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
