<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_job';
    protected $fillable = ['user_id', 'cv_id', 'job_id', 'letter', 'status', 'result'];
    
    public function user()
    {
        return $this->belongsToMany('App\Model\User');
    }

    public function job()
    {
        return $this->hasOne('App\Model\Job');
    }

    public function process()
    {
        return $this->hasMany('App\Model\Process');
    }
}
