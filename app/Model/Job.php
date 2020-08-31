<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function location()
    {
        return $this->belongsTo('App\Model\Locations');
    }

    public function user()
    {
        return $this->belongsToMany('App\Model\User', 'user_job', 'job_id', 'user_id')->withPivot('letter');
    }
}
