<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function manager()
    {
        return $this->hasOne('App\Model\Manager');
    }

    public function candidate()
    {
        return $this->hasOne('App\Model\Candidate');
    }

    public function roleName()
    {
        if ($this->role == config('common.role.Administrator')) {
            return 'Admin';
        } else if ($this->role == config('common.role.Interviewer')) {
            return 'Interviewer';
        } else if ($this->role == config('common.role.BackOffice')) {
            return 'BackOffice';
        }
    }
}
