<?php
namespace App\Repositories\UserResetPW;

use App\Model\User;
use Illuminate\Support\Str;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;

class UserResetPWRepository extends Repository implements UserResetPWRepositoryInterface
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
        parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\ResetPassword::class;
    }

    public function getForgotPassword ($data)
    {
        $user = $this->user->where('email', '=' , $data)->first();
        if ($user == null) {
            return false;
        } else {
            $dataEmail = $this->model->where('email', '=', $data)->first();
            if ($dataEmail != null) {
                $this->model->where('email', '=', $data)->update([
                    'token' => Hash::make(Str::random(5))
                ]);
            } else {
                $this->model->firstOrCreate([
                    'email' => $user->email,
                    'token' => Hash::make(Str::random(5))
                ]);
            }
            $tokenData = $this->model->where('email', $data)->first();
            return $tokenData;
        }
    }

    public function sendResetEmail($email, $token)
    {
        $details = [
            'title' => trans('custom.email_template.forgot_password.title'),
            'body' => trans('custom.email_template.forgot_password.body'),
            'token' => $token,
        ];

        \Mail::to($email)->send(new \App\Mail\UserForgotPassword($details));
        
    }

    public function postConfirmOTP($dataInput, $email)
    {
        $dataUserResetPW = $this->model->where('email', $email)->first();
        if ($dataUserResetPW->token == $dataInput) {
            return true;
        } else {
            return false;
        }
    }

    public function storeNewPW($dataInput, $email)
    {
        $user = $this->user->where('email', '=' , $email)->first();
        $user->update(['password' => $dataInput]);
        return true;
    }
}
