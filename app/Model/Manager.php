<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = ['user_id', 'phone', 'address', 'avatar'];

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

}
