<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MainMember extends Model
{
    protected $table = 'main_member';
    protected $fillable = ['name', 'avatar', 'position', 'quote', 'member_type'];
}
