<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','slug','user_id','status'];
    public $timestamps = false;

    public function candidate()
    {
        return $this->belongsToMany('App\Model\Candidate');
    }

    public function jobs()
    {
        return $this->hasMany('App\Model\Job');
    }
}
