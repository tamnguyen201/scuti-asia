<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;


use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'avatar', 'role', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function roleName()
    {
        switch ($this->role) {
            case config('common.role.Admin'):
                return 'Admin';
            case config('common.role.Interviewer'):
                return 'Interviewer';
            case config('common.role.BackOffice'):
                return 'BackOffice';
            default:
              break;
          }
    }

}
