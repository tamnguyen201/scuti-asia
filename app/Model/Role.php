<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $timestamp = false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
