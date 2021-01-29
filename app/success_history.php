<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class success_history extends Model
{
   protected $fillable=[
       'tran_id','val_id','amount','card_type','store_amount','card_no','bank_tran_id','status','tran_date','error','currency','card_issuer','card_brand','card_sub_brand','card_issuer_country','card_issuer_country_code','store_id','verify_sign','verify_key','verify_sign_sha2','currency_type','currency_amount','currency_rate'
       ,'base_fair','order_id','shipping_id','customer_id','payment_id','risk_level','risk_title',
   ];
}
