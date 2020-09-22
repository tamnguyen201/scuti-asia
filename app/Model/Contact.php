<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'visit_us';
    protected $fillable = ['name', 'email', 'type', 'message', 'status'];
}
