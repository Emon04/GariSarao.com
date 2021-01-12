<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('automobile_service_id');
            $table->foreign('automobile_service_id')->references('id')->on('automobile_services')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('automobile_work_shop_id');
            $table->foreign('automobile_work_shop_id')->references('id')->on('automobile_work_shops')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('automobile_engineer_id');
            $table->foreign('automobile_engineer_id')->references('id')->on('auto_mobile_engineers')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('service_prices');
    }
}
