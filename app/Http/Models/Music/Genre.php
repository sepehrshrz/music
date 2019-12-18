<?php

namespace App\Http\Models\Music;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
  protected $fillable=['genre_name'];
  public function user()
  {
      return $this->belongsToMany(User::class);
  }
  public function song()
  {
      return $this->belongsToMany(Song::class);
  }
}
