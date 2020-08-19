<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = ['avatar', 'phone', 'address', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function cv()
    {
        return $this->hasMany('App\Model\CV');
    }
}
