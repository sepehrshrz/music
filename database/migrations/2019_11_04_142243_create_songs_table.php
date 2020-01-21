<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('title');
            $table->string('lyric');
            $table->time('duration');
            $table->enum('slider',\App\Http\Models\Music\Song::sliders)->default(\App\Http\Models\Music\Song::SLIDERFALSE);
           $table->bigInteger('album_id')->unsigned()->nullable();
           $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');

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
        Schema::dropIfExists('songs');
    }
}
