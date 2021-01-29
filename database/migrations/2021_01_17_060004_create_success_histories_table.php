<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tran_id');
            $table->string('val_id');
            $table->double('amount');
            $table->string('card_type');
            $table->double('store_amount');
            $table->string('card_no')->nullable();
            $table->string('bank_tran_id');
            $table->string('status');
            $table->dateTime('tran_date');
            $table->string('error')->nullable();
            $table->string('currency');
            $table->string('card_issuer');
            $table->string('card_brand');
            $table->string('card_sub_brand');
            $table->string('card_issuer_country');
            $table->string('card_issuer_country_code');
            $table->string('store_id');
            $table->string('verify_sign');
            $table->text('verify_key');
            $table->text('verify_sign_sha2');
            $table->string('currency_type');
            $table->double('currency_amount');
            $table->double('currency_rate');
            $table->double('base_fair');
            $table->integer('order_id');
            $table->string('shipping_id');
            $table->integer('customer_id');
            $table->string('payment_id')->nullable();
            $table->integer('risk_level');
            $table->string('risk_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('success_histories');
    }
}
