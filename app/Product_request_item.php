<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_request_item extends Model
{
    protected $guarded = [];

    public function product_request(){
        return $this->belongsTo('App\Product_request','product_request_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
