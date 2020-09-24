<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
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
			'email' => 'required|email|unique:users,email',
			'phone' => ['nullable','digits:10','regex:/(02|03|07|08|09[2|3|6|7|8|9])+([0-9]{7})\b/'],
            'address' => 'nullable',
            'cv_name' => 'required|unique:cvs,cv_name',
            'cv_url' => 'required|mimes:pdf,doc,docx,xlsx,xls|max:10000'
        ];
    }

    public function messages()
    {
        return [
			'required' => trans('validation.required'),
			'email' => trans('validation.email'),
			'unique' => trans('validation.unique'),
			'regex' => trans('validation.regex'),
            'digits' => trans('validation.digits'),
            'cv_url.mimes' => trans('validation.mimes'),
            'cv_url.max' => trans('validation.max'),
        ];
    }
}
