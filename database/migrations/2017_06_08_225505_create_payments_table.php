<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned();
            $table->string('reserv_code');
            $table->integer('status')->default(0);
            $table->string('pengirim');
            $table->string('bank');
            $table->string('image')->nullable();
            $table->string('valid')->default(0);
            $table->string('description')->nullable();
            $table->boolean('isReadCafe')->default(false);
            $table->boolean('isReadUser')->default(false);
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('reservation_id')->references('id')->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
