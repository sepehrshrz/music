<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateguriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categuries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('Category_Songs', function (Blueprint $table) {
            $table->bigInteger('song_id')->unsigned();
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
            $table->bigInteger('categury_id')->unsigned();
            $table->foreign('categury_id')->references('id')->on('categuries')->onDelete('cascade');
            
        });
        
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categuries');
    }
}
