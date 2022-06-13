<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_sub_two_category extends Model
{
    protected $guarded = [];

    public function subone(){
        return $this->belongsTo('App\Product_sub_category','subone_id','id');
    }
}
