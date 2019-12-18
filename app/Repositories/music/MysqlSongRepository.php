<?php

namespace App\Repositories\Music;

use App\Http\Models\Music\Song;

class MysqlSongRepository extends AbstractSongRepository implements SongRepositoryInterface
{
    public function getSong(int $id)
    {
        $cacheKey = $this->getSongCacheKey($id);

        if ($song = cache()->get($cacheKey)) {
            return $song;
        };

        $song = Song::with('artists')
            ->findOrFail($id)
            ->toArray();

        cache()->put($cacheKey, $song);

        return $song;
    }

}
