<?php

namespace App\Http\Requests\Panell\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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
            'name'=>'required|min:2|max:10',
            'nick_name'=>'required|min:2|max:10',
            'biography'=>'required|min:10|max:500',
            'birthday'=>'required',
        ];
    }
}
