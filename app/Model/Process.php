<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process';
    protected $fillable = ['step', 'name', 'user_job_id'];

    public function user_job()
    {
        return $this->belongsTo('App\Model\UserJob');
    }
}
