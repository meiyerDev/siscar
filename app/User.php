<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function binnacles()
    {
        return $this->hasMany(\App\Binnacle::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function is_admin()
    {
        return (count($this->roles()->where('type','root')->get()) > 0)?true:false;
    }
}
