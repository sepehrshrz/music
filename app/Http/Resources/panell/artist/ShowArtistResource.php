<?php

namespace App\Http\Resources\Panell\Artist;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     ** @package App\Http\Models\Music\Artist
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
        	'name'=>$this->name,
        	'nickname'=>$this->nick_name,
        	'biography'=>$this->biography,
        	'birthday'=>$this->birthday,

		];
    }
}
