<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_request extends Model
{
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }

    public function requestedBy(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function request_items(){
        return $this->hasMany('App\Product_request_item','product_request_id','id');
    }
}
