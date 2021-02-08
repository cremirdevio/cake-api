<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $with = [
        'subcategory'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    // public function stores()
    // {
    //     return $this->hasMany('App\Stores');
    // }

    public function subcategory()
    {
        return $this->hasMany('App\Category', 'id', 'parent_id');
    }
}
