<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function changePassword(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->password, Auth::user()->password))) {
            return redirect()->back()->with("error", trans('custom.alert_messages.not_same'));
        }

        if(strcmp($request->password, $request->new_password) == 0){
            return redirect()->back()->with("error", trans('custom.alert_messages.same'));
        }

        $user = Auth::user();
        $user->password = $request->new_password;
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
