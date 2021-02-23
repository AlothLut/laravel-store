<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductUpdate extends FormRequest
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
            'images.*' => 'mimes:jpeg,png|max:2048',
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'quantity' => 'required',
            'price' => 'required',
        ];
    }
}
