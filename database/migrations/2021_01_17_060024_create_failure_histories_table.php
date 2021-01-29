<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailureHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failure_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tran_id');
            $table->string('error');
            $table->string('status');
            $table->string('bank_tran_id');
            $table->string('currency');
            $table->dateTime('tran_date');
            $table->double('amount');
            $table->string('store_id');
            $table->string('card_type')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_issuer');
            $table->string('card_brand');
            $table->string('card_sub_brand');
            $table->string('card_issuer_country');
            $table->string('card_issuer_country_code');
            $table->string('currency_type');
            $table->double('currency_amount');
            $table->double('currency_rate');
            $table->double('base_fair');
            $table->integer('order_id');
            $table->string('shipping_id');
            $table->integer('customer_id');
            $table->string('payment_id')->nullable();
            $table->string('verify_sign');
            $table->text('verify_key');
            $table->text('verify_sign_sha2');
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
        Schema::dropIfExists('failure_histories');
    }
}
