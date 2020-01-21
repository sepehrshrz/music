<?php

namespace App\Http\Models\Music;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{protected $fillable=['video','mp3_128','mp3_320','image'];
    public function album()
    {
        return $this->belongsToMany(Album::class,'Album_Files');
    }
    public function file()
    {
        return $this->belongsToMany(Artist::class);
    }
    public function song()
    {
        return $this->belongsToMany(Song::class,'song_files');
    }

}
