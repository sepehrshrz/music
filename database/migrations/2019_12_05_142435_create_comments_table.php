<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
        Schema::create('Video_Comments', function (Blueprint $table) {
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->bigInteger('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            
        });
        Schema::create('Song_Comments', function (Blueprint $table) {
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->bigInteger('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

        });
        Schema::create('Album_Comments', function (Blueprint $table) {
            $table->bigInteger('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->bigInteger('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}


