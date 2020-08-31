<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process';
    public $timestamps = false;
    protected $fillable =['name','user_job_id','step'];
}
