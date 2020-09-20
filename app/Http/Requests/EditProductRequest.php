<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'bail|required|min:4',
            'brand' => 'bail|required||alpha_dash',
            'description' => 'bail|required|max:255',
            'image_current' => 'required',
            'image_link' => 'image',
            'original_price' => 'bail|required|integer',
            'current_price' => 'bail|required|integer',
        ];
    }
}
