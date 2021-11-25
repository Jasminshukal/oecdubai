<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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

        if(\Request::route()->getName()=="add")
        { 
            return [
                'title' => 'required|unique:events,title',
                'place' => 'required',
                'cat_id' => 'required',
                'date' => 'required|date',
                'time' => 'required',
                'description' => 'required',
                'image_file' => 'required|mimes:png,jpg'
            ];

        }
        else
        {
            return [
                'title' => 'required',
                'place' => 'required',
                'cat_id' => 'required',
                'date' => 'required|date',
                'time' => 'required',
                'description' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'cat_id.required' => 'Category Filed is required',
        ];
    }
}
