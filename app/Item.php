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
}
