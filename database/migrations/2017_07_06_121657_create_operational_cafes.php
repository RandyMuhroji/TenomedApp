<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationalCafes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operational_cafe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cafe_id')->unsigned();
            $table->string('day');
            $table->string('open_hour');
            $table->string('close_hour');
            $table->string('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('cafe_id')->references('id')->on('cafes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operational_cafe');
    }
}
