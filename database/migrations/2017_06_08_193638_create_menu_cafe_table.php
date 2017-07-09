<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCafeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_cafe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cafe_id')->unsigned();
            $table->string('name');
            $table->string('price');
            $table->string('images')->nullable();
            $table->string('tag')->nullable();
            $table->string('category')->nullable();
            $table->integer('status')->nullable();
            $table->string('desc')->nullable();
            $table->string('genre')->nullable();
            
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
        Schema::drop('menu_cafe');
    }
}
