<?php

namespace App\Http\Models\User;

use App\Http\Models\Music\Song;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function songs()
    {
        return $this->hasOne(Song::class);
    }
}
