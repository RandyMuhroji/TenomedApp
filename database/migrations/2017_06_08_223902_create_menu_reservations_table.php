<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('menu_reservations',function(Blueprint $table){
            $table->increments('id');
            $table->integer('reservations_id')->unsigned();
            $table->integer('menu_cafe_id')->unsigned();
            $table->integer('qunatity')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('reservations_id')->references('id')->on('reservations');
            $table->foreign('menu_cafe_id')->references('id')->on('menu_cafe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_reservations');
    }
}
