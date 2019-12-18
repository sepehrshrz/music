<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video')->nullable();
            $table->string('mp3_128');
            $table->string('mp3_320');
            $table->string('image');

            $table->timestamps();
        });
        Schema::create('Song_Files', function (Blueprint $table) {
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->bigInteger('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
