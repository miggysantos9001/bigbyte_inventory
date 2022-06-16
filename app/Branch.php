<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = [];

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }
}
