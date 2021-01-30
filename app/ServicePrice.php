<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePrice extends Model
{
    public function automobileService(){
        return $this->belongsTo(AutomobileService::class,'automobile_service_id');
    }
    public function automobileWorkshop(){
        return $this->belongsTo(AutomobileWorkShop::class,'automobile_work_shop_id');
    }
     public function automobileEngineer(){
        return $this->belongsTo(AutoMobileEngineer::class,'automobile_engineer_id');
    }

}
