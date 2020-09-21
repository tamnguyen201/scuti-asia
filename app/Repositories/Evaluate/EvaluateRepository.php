<?php
namespace App\Repositories\Evaluate;

use App\Repositories\Repository;

class EvaluateRepository extends Repository implements EvaluateRepositoryInterface
{
    public function getModel()
    {
        return \App\Model\Evaluate::class;
    }

    public function sendEmail($email, $time, $name)
    {
        $details = [
            'title' => trans('custom.email_template.forgot_password.title'),
            'time'=>$time,
            'name' =>$name
        ];

        \Mail::to($email)->send(new \App\Mail\EmailEvent($details));
        
    }
}
