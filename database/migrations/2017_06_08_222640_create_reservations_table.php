<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations',function(Blueprint $table){
            $table->increments('id');
            $table->integer('idCafe');
            $table->integer('idUser');
            $table->integer('persons');
            $table->integer('total')->nullable();
            $table->string('bookingDate')->nullable();
            $table->integer('status')->nullable();
            $table->date('expired')->nullable();
            $table->string('desc')->nullable();
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
        Schema::drop('reservations');
    }
}
