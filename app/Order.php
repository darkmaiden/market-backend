<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function deal()
    {
        //describe a relation
        return $this->belongsTo('App\Deal');
    }

    public function item()
    {
        //describe a relation
        return $this->belongsTo('App\Item');
    }
}
