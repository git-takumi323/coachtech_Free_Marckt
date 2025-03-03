<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
            'categories' => 'required|array',
            'condition' => 'required|string',
            'price' => 'required|numeric|min:0',
        ];
    }
}
