<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_check_list extends Model
{
    protected $guarded = [];

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }

    public function case_setup(){
        return $this->belongsTo('App\Case_setup','case_setup_id','id');
    }

    public function lfi(){
        return $this->belongsTo('App\Loaner_form_list','lfi_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
}
