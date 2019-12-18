<?php

namespace App\Models\User;

use App\Http\Models\Music\Comment;
use App\Http\Models\Music\Genre;
use App\Http\Models\Music\Like;
use App\Http\Models\User\Favorite;
use App\Http\Models\User\History;
use App\Http\Models\User\playlist;
use App\Http\Models\User\Profile;
use App\Http\Models\User\Subscribe;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];




	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }
    public function history()
    {
        return $this->belongsTo(History::class);
    }
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }
    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
