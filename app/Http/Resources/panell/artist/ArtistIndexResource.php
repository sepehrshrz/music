<?php

namespace App\Http\Resources\panell\artist;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistIndexResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	/**
	 * @param \Illuminate\Http\Request $request
	 * @package App\Http\Models\Music
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id'         => $this->id,
			'name'       => $this->name,
			'nick_name'  => $this->nick_name,
			'biography'    => $this->biography,
			'birthday'   => $this->birthday,
			'created_at' => $this->created_at,

		];
	}
}
