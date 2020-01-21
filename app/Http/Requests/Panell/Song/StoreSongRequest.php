<?php

namespace App\Http\Requests\Panell\Song;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		return [
			'name'      => 'required|min:2|max:15',
//			'title' => 'required|min:5|max:20',
//			'lyric' => 'required|min:10',
//			'duration'  => 'required',
//			'artist_name'=>'required'
		];
    }
}
