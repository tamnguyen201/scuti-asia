<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company_information";
    protected $fillable = ['name', 'descripton', 'logo', 'email', 'phone', 'address', 'facebook_page', 'youtube_page'];
    public $timestamps = false;
    
}
