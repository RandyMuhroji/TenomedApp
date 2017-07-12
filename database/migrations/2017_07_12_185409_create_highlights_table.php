<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highlights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cafe_id')->unsigned();
            $table->string('name');
            $table->timestamp('created_at');
            
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
        Schema::dropIfExists('highlights');
    }
}
