<?php

namespace App\Http\Models\Music;

use App\Http\Models\User\Favorite;
use App\Http\Models\User\History;
use App\Http\Models\User\Playlist;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Song extends Model
{
	protected $fillable=['name','title','lyric','duration'];
const SLIDERTRUE='true';
const SLIDERFALSE='false';
const sliders=[
	self::SLIDERTRUE,
	self::SLIDERFALSE,
];
    public function history()
    {
        return $this->belongsToMany(History::class,'History_Songs');
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
        return $this->belongsToMany(Categury::class,'Category_Songs');
    }
    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function file()
    {
        return $this->belongsToMany(File::class,'song_files');
    }

    public function like()
    {
        return $this->belongsToMany(Like::class,'Song_Likes');
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
		return $this->belongsToMany(Genre::class,'Genre_songs');
	}
}
