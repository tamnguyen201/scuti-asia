<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() 
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('client.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember)) {
            return redirect()->route('home');
        }

        Session::flash('error', trans('custom.alert_messages.invalid'));

        return redirect()->route('client.login');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if (!(Hash::check($request->password, Auth::user()->password))) {
            return response()->json(["error" => trans('custom.alert_messages.not_same')]);
        }

        if(strcmp($request->password, $request->new_password) == 0){
            return response()->json(["error" => trans('custom.alert_messages.same')]);
        }

        Auth::user()->update([ 'password' => $request->new_password ]);

        return response()->json(["success" => trans('custom.alert_messages.success')]);
    }

    public function forgot()
    {
        return view('admin.auth.forgotPw');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
