<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewSpaper extends Model
{
    protected $table = 'new_spapers';
    protected $fillable = ['title', 'image', 'description', 'url'];
}