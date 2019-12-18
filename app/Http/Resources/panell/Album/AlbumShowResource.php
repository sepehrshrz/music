<?php

namespace App\Http\Resources\Panell\Album;

use App\Http\Models\Music\Album;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @mixin Album
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
			'id'=>$this->id,
			'name'=>$this->name,
			'created_at'=>$this->created_at,

		];
    }
}
