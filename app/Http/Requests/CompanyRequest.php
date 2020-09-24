<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => ['required','digits:10','regex:/(02|03|07|08|09[2|3|6|7|8|9])+([0-9]{7})\b/'],
            'address' => 'required',
            'facebook_page' => 'required',
            'youtube_page' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'logo.mimes' => trans('validation.mimes'),
            'logo.max' => trans('validation.max'),
            'email.email' => trans('validation.email'),
            'regex' => trans('validation.regex'),
            'digits' => trans('validation.digits'),
        ];
    }
}
