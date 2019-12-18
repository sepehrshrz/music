<?php

namespace App\Http\Models\Music;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function video()
    {
        return $this->belongsToMany(Video::class);
    }
    public function song()
    {
        return $this->belongsToMany(Song::class);
    }
}
