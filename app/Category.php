<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items()
    {
        //relation 1:M
        return $this->hasMany('App\Item');
    }
}
