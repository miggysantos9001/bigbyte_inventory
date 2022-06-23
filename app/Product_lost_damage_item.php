<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_lost_damage_item extends Model
{
    protected $guarded = [];

    public function product_lost(){
        return $this->belongsTo('App\Product_lost_damage','lost_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
