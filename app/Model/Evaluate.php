<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    protected $fillable = ['process_step_id', 'status', 'comment', 'reason'];
}
