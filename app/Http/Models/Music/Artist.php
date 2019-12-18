<?php

namespace App\Http\Models\Music;

use App\Http\Models\User\Subscribe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Artist
 *
 * @package App\Http\Models\Music
 * @property int $id




 * @property int $name
 * @property int $nick_name
 * @property int $biography
 * @property int $birthday

 */

class Artist extends Model

{





	use softDeletes;







	protected $fillable=['name','nick_name','biography','birthday'];

    public function subscribe()
    {
        return $this->belongsTo(Subscribe::class);
    }
    public function file()
    {
        return $this->belongsToMany(File::class);
    }
    public function song()
    {
        return $this->belongsToMany(Song::class,'Artist_Song');
    }
}
