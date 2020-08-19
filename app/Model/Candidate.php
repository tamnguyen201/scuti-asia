<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['phone', 'address','letter', 'user_id', 'cv_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function cv()
    {
        return $this->belongsTo('App\Model\CV');
    }

    public function job()
    {
        return $this->belongsTo('App\Model\Job');
    }
}
