<?php

namespace App\Http\Resources\panell\Genre;

use Illuminate\Http\Resources\Json\JsonResource;

class GenreIndexResource extends JsonResource
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
        	'id'=>$this->id,
        	'name'=>$this->genre_name,
		];
    }
}
