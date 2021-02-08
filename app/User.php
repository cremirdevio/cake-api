<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;


    protected $guarded = [
        'id', 'email_verified_at',
    ];

    protected $with = [
        'wallet', 'info',
    ];

    protected $hidden = [
        'password',
    ];

    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function info()
    {
        return $this->hasOne('App\Information');
    }

    public function store()
    {
        return $this->hasMany('App\Store');
    }
}
