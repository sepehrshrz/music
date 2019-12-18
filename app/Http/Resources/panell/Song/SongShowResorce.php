<?php

namespace App\Http\Resources\Panell\Song;

use Illuminate\Http\Resources\Json\JsonResource;

class SongShowResorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		return [
			'id'         => $this->id,
			'name'       => $this->name,
			'lyric'  => $this->lyric,
			'duration'    => $this->duration,

			'created_at' => $this->created_at,

		];
    }
}
