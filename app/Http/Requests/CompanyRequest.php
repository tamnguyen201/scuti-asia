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
            'logo' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            //'phone' => 'required|regex:/(09|01[2|3|6|8|9])+([0-9]{8})/',
            'address' => 'required',
            'facebook_page' => 'required',
            'youtube_page' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'email.email' => trans('validation.email'),
            'regex' => trans('validation.regex'),
        ];
    }
}
