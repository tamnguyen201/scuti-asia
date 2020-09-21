<?php
namespace App\Repositories\PWReset;

use App\Model\Admin;
use Illuminate\Support\Str;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;

class PWResetRepository extends Repository implements PWResetRepositoryInterface
{
    protected $admin;

    public function __construct(Admin $admin) {
        $this->admin = $admin;
        parent::__construct();
    }

    public function getModel()
    {
        return \App\Model\ResetPassword::class;
    }

    public function getForgotPassword ($data)
    {
        $admin = $this->admin->where('email', '=' , $data)->first();
        if ($admin == null) {
            return false;
        } else {
            $dataEmail = $this->model->where('email', '=', $data)->first();
            if ($dataEmail != null) {
                $this->model->where('email', '=', $data)->update([
                    'token' => Str::random(5)
                ]);
            } else {
                $this->model->firstOrCreate([
                    'email' => $admin->email,
                    'token' => Str::random(5)
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

        \Mail::to($email)->send(new \App\Mail\ForgotPassword($details));
        
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
        $admin = $this->admin->where('email', '=' , $email)->first();
        $admin->update(['password' => $dataInput]);
        return true;
    }
}
