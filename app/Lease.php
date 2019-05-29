<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    public function vehicle(){
        $this->belongsTo(Vehicle::class);
    }

    public function user(){

    }
}
