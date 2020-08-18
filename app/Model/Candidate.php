<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['phone', 'address', 'user_id', 'cv_id'];
    
}
