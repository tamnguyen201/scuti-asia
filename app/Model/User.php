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
        'name', 'email', 'password', 'phone', 'address', 'avatar',
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

    public function hasRole($role)
    {
        return \App\Model\Manager::where('user_id', \auth()->id)->where('role_id', $role)->first() ? true : false;
    }

    public function hasAnyRole($roles)
    {
        $userRole = \App\Model\Manager::where('user_id', \auth()->id())->first()->role_id;
        
        return in_array($userRole, $roles) ? true : false;
    }
}
