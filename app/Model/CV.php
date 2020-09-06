<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cvs';
    protected $fillable = ['cv_name', 'cv_url', 'user_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

}
