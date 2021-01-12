<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobileServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobile_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name');
            $table->string('description');
            $table->string('status');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('automobile_work_shop_id');
            $table->foreign('automobile_work_shop_id')->references('id')->on('automobile_work_shops')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('automobile_services');
    }
}
