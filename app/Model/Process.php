<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = ['step', 'name', 'user_job_id'];
}
