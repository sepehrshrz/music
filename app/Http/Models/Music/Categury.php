<?php

namespace App\Http\Models\Music;

use Illuminate\Database\Eloquent\Model;

class Categury extends Model
{
    protected $fillable=['name'];
    public function song()
    {
        return $this->belongsToMany(Song::class);
    }
}
