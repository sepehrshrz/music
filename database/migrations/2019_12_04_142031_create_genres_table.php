<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genre_name');
          
            
            
            $table->timestamps();
        });

		Schema::create('Genre_songs', function (Blueprint $table) {
		$table->bigInteger('genre_id')->unsigned();
		$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
		$table->bigInteger('song_id')->unsigned();
		$table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
		
		});

		Schema::create('User_Genres', function (Blueprint $table) {
			$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

			$table->bigInteger('genre_id')->unsigned();
			$table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');

		});

		}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
