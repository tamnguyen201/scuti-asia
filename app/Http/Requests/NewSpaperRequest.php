<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSpaperRequest extends FormRequest
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
            'name' => 'required|unique:partner_companies,name',
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'logo.mimes' => trans('validation.mimes'),
            'logo.max' => trans('validation.max'),
        ];
    }
}
