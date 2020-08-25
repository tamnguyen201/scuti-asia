<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Repositories\User\UserRepositoryInterface;

class AdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function login() 
    {
        if (auth()->check()) {
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

    // public function forgot()
    // {
    //     return view('admin.auth.forgotPw');
    // }

    // public function getForgotPassword(AdminRequest $request)
    // {
    //     if ($this->userRepository->getPassword($request->email) == true) {
    //         return redirect()->route('admin.forgot_password.confirmOTP');
    //     } else {
    //         return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
    //     }
        
    // }

    // public function postConfirmOTP(AdminRequest $request){
    //     $this->$this->userRepository->postConfirmOTP($request->code);
    // }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    // public function confirmOTP()
    // {
    //     return view('admin.auth.enter_passwordtoken');
    // }


}
