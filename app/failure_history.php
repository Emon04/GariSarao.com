<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class failure_history extends Model
{
    protected $fillable=[
             'tran_id','error','status','bank_tran_id','currency','tran_date','amount','store_id','card_type','card_no','card_issuer','card_brand','card_sub_brand','card_issuer_country','card_issuer_country_code','currency_type','currency_amount','currency_rate','base_fair','order_id','shipping_id','customer_id','payment_id','verify_sign','verify_key','verify_sign_sha2',
    ];
}
