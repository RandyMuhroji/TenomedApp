<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('filename');
            $table->string('type');
            $table->string('original_filename');
            $table->string('status')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();

            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('album_id')->references('id')->on('album_gallery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gallery');
    }
}
