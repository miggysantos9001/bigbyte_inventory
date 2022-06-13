<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sub_category extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Product_category','category_id','id');
    }
}
