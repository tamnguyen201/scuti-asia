<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = "password_resets";
    protected $guarded = [];
    public $timestamps = false;
}
