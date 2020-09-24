<?php
namespace App\Repositories\Evaluate;

use App\Repositories\Repository;

class EvaluateRepository extends Repository implements EvaluateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Evaluate::class;
    }

    public function sendEmail($email, $time, $name, $job)
    {
        $details = [
            'title' => trans('custom.email_template.forgot_password.title'),
            'time'=>$time,
            'name' =>$name,
            'job'=> $job
        ];

        \Mail::to($email)->send(new \App\Mail\EmailEvent($details));
        
    }

    public function sendFailEmail($email,$name, $job, $reason)
    {
        $details = [
            'title' => trans('custom.email_template.forgot_password.title'),
            'name' =>$name,
            'job'=> $job,
            'reason'=>$reason
        ];

        \Mail::to($email)->send(new \App\Mail\EmailEvaluateFailed($details));
        
    }
}
