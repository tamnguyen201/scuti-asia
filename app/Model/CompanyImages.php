<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompanyImages extends Model
{
    protected $table = "company_images";
    protected $fillable = ['name', 'description', 'image_url'];
}
