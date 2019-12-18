<?php

namespace App\Http\Models\Music;

use App\Http\Models\User\Favorite;
use App\Http\Models\User\History;
use App\Http\Models\User\Playlist;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	protected $fillable=['name','title','lyric','duration'];

    public function history()
    {
        return $this->belongsToMany(History::class);
    }
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
    public function artists()
    {
        return $this->belongsToMany(Artist::class,'Artist_Song');
    }
    public function categury()
    {
        return $this->belongsToMany(Categury::class);
    }
    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function file()
    {
        return $this->belongsToMany(File::class);
    }

    public function like()
    {
        return $this->belongsToMany(Like::class);
    }
    public function playlistS()
    {
        return $this->belongsToMany(Playlist::class);
    }
    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }
    public function video()
    {
        return $this->hasOne(Video::class);
    }
    public function genre()
	{
		return $this->belongsToMany(Genre::class);
	}
}
