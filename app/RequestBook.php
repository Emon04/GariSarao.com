<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestBook extends Model
{
    public function service(){
        return $this->belongsTo(AutomobileService::class,'service_id');
    }
    public function workshop(){
        return $this->belongsTo(AutomobileWorkShop::class,'workshop_id');
    }
}
