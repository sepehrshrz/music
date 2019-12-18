<?php

namespace App\Repositories\Music;

use App\Http\Models\Music\Song;

abstract class AbstractSongRepository
{
    protected function getSongCacheKey($id)
    {
        return "song_{$id}";
    }
}
