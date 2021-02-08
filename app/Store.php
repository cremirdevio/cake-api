<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $with = [
        'opentime',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function opentime()
    {
        return $this->hasMany('App\OpenTime');
    }
}
