<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
     Schema::create('Video_Likes', function (Blueprint $table) {
         $table->bigInteger('video_id')->unsigned();
         $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
         $table->bigInteger('like_id')->unsigned();
         $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade');
         
     });
     Schema::create('Song_Likes', function (Blueprint $table) {
         $table->bigInteger('song_id')->unsigned();
         $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
         $table->bigInteger('like_id')->unsigned();
         $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade');

     
     });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
