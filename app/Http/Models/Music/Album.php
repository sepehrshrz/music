<?php

namespace App\Http\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
	/**
	 * class Album
	 *
	 * @package App\Http\Models\Music
	 * @property int $id
	 * @property string $name
	 * @property Carbon $crated_at
	 * @property Carbon $updated_at
	 *
	 */
{
    protected $fillable=['name'];
    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
    public function file()
    {
        return $this->belongsToMany(File::class,'Album_Files');
    }
}
