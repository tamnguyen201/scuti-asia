<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'description', 'logo', 'email', 'phone', 'address', 'facebook_page', 'youtube_page'];
    public $timestamps = false;
    
}
