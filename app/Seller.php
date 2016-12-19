<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use \Illuminate\Auth\Authenticatable;

    public function items()
    {
        //relation 1:M
        return $this->hasMany('App\Item');
    }

    public function deals()
    {
        //relation 1:M
        return $this->hasMany('App\Deal');
    }

    public function messages()
    {
        //relation 1:M
        return $this->hasMany('App\Message');
    }
}
