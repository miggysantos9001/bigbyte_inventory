<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_lost_damage extends Model
{
    protected $guarded = [];

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }

    public function lost_items(){
        return $this->hasMany('App\Product_lost_damage_item','lost_id','id');
    }
}
