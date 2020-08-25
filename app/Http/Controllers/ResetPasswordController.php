<?php

namespace App\Http\Controllers;
use App\Model\ResetPassword;
use App\Http\Requests\OTPRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ChangePWRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Repositories\PWReset\PWResetRepositoryInterface;


class ResetPasswordController extends Controller
{
    protected $forgotPasswordRepository;

    public function __construct(PWResetRepositoryInterface $forgotPasswordRepository)
    {
        $this->forgotPasswordRepository = $forgotPasswordRepository;
    }

    public function forgot()
    {
        return view('admin.auth.forgotPw');
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
                $this->sendResetEmail($token->email, $token->token);
                return redirect()->route('admin.forgot_password.confirmOTP', ['email' => $token->email]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }
    }

    public function sendResetEmail($email, $token)
    {
        $this->forgotPasswordRepository->sendResetEmail($email, $token);
    }

    public function confirmOTP($email)
    {
        return view('admin.auth.enter_passwordtoken', compact('email'));
    }

    public function postConfirmOTP(OTPRequest $request, $email){
        $dataCheckOTP = $this->forgotPasswordRepository->postConfirmOTP($request->code, $email);
        if ($dataCheckOTP ==false) {
            return redirect()->back()->withErrors(['message' => trans('custom.alert_messages.not_found')]);
        } else {
            return redirect()->route('admin.forgot_password.show_form_changePW', $email);
        }
    }

    public function formNewPW($email)
    {
        return view('admin.auth.change-password', compact('email'));
    }

    public function storeNewPW(ChangePWRequest $request, $email)
    {
        $dataChangPW = $this->forgotPasswordRepository->storeNewPW($request->new_password,$email);
        // dd($dataChangPW);
        if ($dataChangPW == true) {
            return redirect()->route('login');
        } else {
            return redirect()-back()>withErrors(['message' => trans('custom.alert_messages.fail')]);
        }
        
    }
}
