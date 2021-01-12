<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomobileWorkShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automobile_work_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('about');
            $table->string('address');
            $table->string('service_areas');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('status');
            $table->string('image');
            $table->string('trade_license');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('automobile_work_shops');
    }
}
