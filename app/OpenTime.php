<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenTime extends Model
{
    protected $timestamp = false;
    protected $table = 'open_time';

    protected $guarded = [
        'id',
    ];

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
