<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';
    protected $fillable = ['cv_url', 'user_id'];

    public function candidate()
    {
        return $this->hasOne('App\Model\Candidate');
    }
}
