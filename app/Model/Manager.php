<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = ['user_id','role_id', 'phone', 'address', 'avatar'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }
}
