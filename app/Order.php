<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $with = [
        'user', 'items', 'coupon',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function items()
    {
        return $this->belongsToMany('App\Product');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Coupon');
    }
}
