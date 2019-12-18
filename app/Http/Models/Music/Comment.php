<?php

namespace App\Http\Models\Music;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable=['text'];
    public function album()
    {
        return $this->belongsToMany(Album::class);
    }
    public function song()
    {
        return $this->belongsToMany(Song::class);
    }
    public function video()
    {
        return $this->belongsToMany(Video::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
