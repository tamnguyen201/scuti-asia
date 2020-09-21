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

    public function getForgotPassword ($email)
    {
        $user = $this->user->where('email', '=' , $email)->first();

        if ($user != null) {
            $dataEmail = $this->model->where('email', '=', $email)->first();
            if ($dataEmail != null) {
                $this->model->where('email', '=', $email)->update([
                    'token' => Str::random(50)
                ]);
            } else {
                $this->model->firstOrCreate([
                    'email' => $user->email,
                    'token' => Str::random(50)
                ]);
            }
            $data['passwordReset'] = $this->model->where('email', $email)->first();
            $data['user'] = $user;

            return $data;
        }

        return false;
    }

    public function sendResetEmail($user, $token)
    {
        $details = [
            'name' => $user->name,
            'token' => $token,
        ];

        \Mail::to($user->email)->send(new \App\Mail\UserForgotPassword($details));
        
    }

    public function storeNewPW($password, $token)
    {
        $data = $this->model->where('token', '=' , $token)->first();
        $this->user->where('email', '=' , $data->email)->update(['password' => \Hash::make($password)]);
        $this->model->where('token', '=' , $token)->delete();
        
        return true;
    }
}
