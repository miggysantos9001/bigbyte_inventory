<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function onhand(){
        return $this->hasOne('App\Product_onhand','product_id','id');
    }
}
