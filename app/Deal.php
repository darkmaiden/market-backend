<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public function orders()
    {
        //relation 1:M
        return $this->hasMany('App\Order');
    }

    public function seller()
    {
        //describe a relation
        return $this->belongsTo('App\Seller');
    }

    public function customer()
    {
        //describe a relation
        return $this->belongsTo('App\Customer');
    }
}
