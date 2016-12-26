<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function orders()
    {
        //relation 1:M
        return $this->hasMany('App\Order');
    }

    public function category()
    {
        //describe a relation
        return $this->belongsTo('App\Category');
    }

    public function seller()
    {
        //describe a relation
        return $this->belongsTo('App\Seller');
    }
}
