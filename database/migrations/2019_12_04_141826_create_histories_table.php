<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
            
            $table->timestamps();
        });
        Schema::create('History_Songs', function (Blueprint $table) {
            $table->bigInteger('historie_id')->unsigned();
            $table->foreign('historie_id')->references('id')->on('histories')->onDelete('cascade');
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
