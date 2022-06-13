<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function subtwo(){
        return $this->belongsTo('App\Product_sub_two_category','subtwo_id','id');
    }
}
