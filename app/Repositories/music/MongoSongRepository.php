<?php

namespace App\Repositories\Music;

use App\Http\Models\Music\Song;

class MongoSongRepository extends AbstractSongRepository
{
    public function getSong($id)
    {
        $cacheKey = $this->getSongCacheKey($id);

        if ($song = cache()->get($cacheKey)) {
            return $song;
        };

        // Mongo

        cache()->put($cacheKey, $song);

        return $song;
    }
}
