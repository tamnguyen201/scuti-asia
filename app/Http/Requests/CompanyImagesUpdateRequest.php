<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyImagesUpdateRequest extends FormRequest
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
            'image_url' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'image_url.mimes' => trans('validation.mimes'),
            'image_url.max' => trans('validation.max'),
        ];
    }
}
