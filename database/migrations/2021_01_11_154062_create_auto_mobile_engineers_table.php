<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoMobileEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_mobile_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('gender',10);
            $table->string('phone',15);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status');
            $table->string('image');
            $table->unsignedBigInteger('automobile_work_shop_id');
            $table->foreign('automobile_work_shop_id')->references('id')->on('automobile_work_shops')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('auto_mobile_engineers');
    }
}
