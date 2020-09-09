<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = ['name', 'email', 'message', 'type'];
}
