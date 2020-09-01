<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientApplyJobRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => ['required', 'digits:10', 'regex:/(02|03|07|08|09|[2|3|6|7|8|9])+([0-9]{7})\b/'],
            'address' => 'required',
            //'cv_name' => 'required',
            // 'cv_url' => 'required|mimes:pdf|max:10000',
            //'cv_id' => 'required',
            'letter' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'email' => trans('validation.email'),
            'regex' => trans('validation.regex'),
            'digits' => trans('validation.digits'),
            'max' => trans('validation.max'),
        ];
    }
}
