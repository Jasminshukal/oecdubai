<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUniversity extends FormRequest
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
            'url' => 'required|unique:universities|url',
            'name' => 'required',
            'county' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cat_id.required' => 'Category Filed is required',
        ];
    }
}
