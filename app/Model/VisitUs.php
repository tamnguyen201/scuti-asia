<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VisitUs extends Model
{
    protected $table = 'visit_us';
    protected $fillable = ['name', 'email', 'message', 'type'];
}
