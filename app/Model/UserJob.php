<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_job';
    protected $fillable = ['user_id', 'cv_file', 'job_id', 'letter', 'status', 'result'];
    
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Model\Job');
    }

    public function process()
    {
        return $this->hasMany('App\Model\Process');
    }
}
