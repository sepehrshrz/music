<?php

namespace App\Http\Requests\Panell\Artist;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
	 * @package App\Http\Models\Panell\Artist
     * @proprty_read string $name
     * @proprty_read string $nick_name
     * @proprty_read string $biography
     * @proprty_read date_time $birthday
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
			'nick_name' => 'required|min:2|max:15',
			'biography' => 'required|min:20|max:500',
			'birthday'  => 'required',
        ];
    }
}
