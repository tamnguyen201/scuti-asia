<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('admin.user.changePassword');
    }

    public function formChangePW()
    {
        return view('admin.auth.change-password');
    }

    public function store(UserRequest $request)
    {
        // dd($request->all());
        // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        \App\Model\Admin::find(Auth::guard('admin')->user()->id)->update(['password'=> $request->new_password]);
        return redirect()->route('admin.information');
    }
}
