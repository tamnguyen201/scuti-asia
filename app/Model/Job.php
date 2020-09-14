<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'slug', 'description', 'content', 'salary', 'expireDay', 'category_id', 'location_id', 'status'];

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
        return $this->belongsToMany('App\Model\User', 'user_job');
    }

    public function userjob()
    {
        return $this->hasMany('App\Model\UserJob');
    }

    public function formatExpireDay()
    {
        return \Carbon\Carbon::parse($this->expireDay)->format('d/m/Y');
    }
}
