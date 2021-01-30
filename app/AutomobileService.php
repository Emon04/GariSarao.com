<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AutomobileService extends Model
{
    //
    public function servicePrices(){
        return $this->hasMany(ServicePrice::class,'automobile_service_id');
    }
    public function workshop(){
        return $this->belongsTo(AutomobileWorkShop::class,'automobile_work_shop_id');
    }

}
