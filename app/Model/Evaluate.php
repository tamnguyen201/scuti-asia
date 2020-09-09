<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    protected $table = 'evaluates';
    protected $fillable = ['process_id', 'status', 'comment', 'reason'];

    public function process()
    {
        return $this->belongsTo('App\Model\Process');
    }

}
