<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:100',
            'description' => 'required|min:10|max:1000',
            'country' => 'required|min:4|max:100',
            'brand' => 'required|min:4|max:100',
            'vol' => 'required|min:0|max:12'
        ];
    }
}
