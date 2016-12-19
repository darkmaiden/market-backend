<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
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
