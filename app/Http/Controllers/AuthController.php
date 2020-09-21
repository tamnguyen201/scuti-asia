<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePWRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\OTPRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserResetPW\UserResetPWRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $forgotPasswordRepository;

    public function __construct(UserResetPWRepositoryInterface $forgotPasswordRepository)
    {
        $this->forgotPasswordRepository = $forgotPasswordRepository;
    }
    
    public function login() 
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('client.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $redirect = $request->redirect ? $request->redirect : route('home');
        $show_notice = $request->redirect ? false : true;
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember)) {
            Session::flash('login_success', true);
            Session::flash('show_notice', $show_notice);

            return redirect($redirect);
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

    public function register() 
    {
        return view('client.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = \App\Model\User::create($request->all());

        return redirect()->route('client.login')->with('success', trans('custom.alert_messages.success'));
    }

    public function forgotPassword()
    {
        return view('client.auth.forgot_password');
    }

    public function getForgotPassword(ForgotPasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            $token = $this->forgotPasswordRepository->getForgotPassword($request->email);

            if ($token == false) {
                return redirect()->back()->withErrors(['error' => trans('custom.alert_messages.not_found')]);
            } else {
                DB::commit();
                $this->sendResetEmail($token['user'], $token['passwordReset']->token);
                alert(trans('custom.alert_messages.contact_alert.title'), trans('custom.alert_messages.contact_alert.text'), 'success');
                
                return back();
            }

        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }
    }

    public function sendResetEmail($user, $token)
    {
        $this->forgotPasswordRepository->sendResetEmail($user, $token);
    }

    public function formResetPW($token)
    {
        $result = \App\Model\ResetPassword::where('token', $token)->first();

        if($result != null){
            $data['token'] = $token;
            return view('client.auth.reset_password', $data);
        } else {
            echo 'Đường dẫn không tồn tại.';
        }
    }

    public function storeResetPW(ChangePWRequest $request, $token)
    {
        $dataChangPW = $this->forgotPasswordRepository->storeNewPW($request->new_password, $token);

        if ($dataChangPW == true) {
            return redirect()->route('client.login')->with('success', trans('custom.alert_messages.success'));
        } else {
            return redirect()-back()>withErrors(['message' => trans('custom.alert_messages.fail')]);
        }
        
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
