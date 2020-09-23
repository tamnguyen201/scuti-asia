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
            'cv_file' => 'required_without_all:cv_name,cv_url',
            'cv_name' => 'required_without:cv_file',
            'cv_url' => 'required_without:cv_file|mimes:pdf,doc,docx|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'required_without' => trans('validation.required'),
            'required_without_all' => trans('validation.required'),
            'mimes' => trans('validation.mimes'),
            'max' => trans('validation.max'),
        ];
    }
}
