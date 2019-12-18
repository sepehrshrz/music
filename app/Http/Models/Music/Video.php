<?php

namespace App\Http\Models\Music;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $fillable=['time'];
    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
public function like()
{
    return $this->belongsToMany(Like::class);
}
public function song()
{
    return $this->hasOne(Song::class);
}
}
