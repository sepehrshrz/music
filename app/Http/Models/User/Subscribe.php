<?php

namespace App\Http\Models\User;

use App\Http\Models\Music\Artist;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
public function user()
{
    return $this->belongsTo(User::class);
}
public function artists()
{
    return $this->hasMany(Artist::class);
}
}
