<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaseRequest extends Model
{
    protected $guarded = [];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

}
