<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $with = [
        'store', 'category'
    ];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function order()
    {
        return $this->belongsToMany('App\Order');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
