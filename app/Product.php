<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function subtwo(){
        return $this->belongsTo('App\Product_sub_two_category','subtwo_id','id');
    }

    public function onhand(){
        return $this->hasOne('App\Product_onhand','product_id','id');
    }

    public function requisitions(){
        return $this->hasMany('App\Product_request_item','product_id','id');
    }

    public function delivered(){
        return $this->hasMany('App\Case_check_list','product_id','id');
    }

    public function lost_missing(){
        return $this->hasMany('App\Product_lost_damage_item','product_id','id');
    }
}
