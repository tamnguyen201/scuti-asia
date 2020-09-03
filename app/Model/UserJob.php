<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    protected $table = 'user_job';
    protected $fillable = ['user_id', 'cv_id', 'job_id', 'letter'];
    
}
