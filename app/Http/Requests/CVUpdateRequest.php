<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CVUpdateRequest extends FormRequest
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
            'cv_name' => 'required|unique:cvs,cv_name,' . $this->id,
            'cv_url' => 'nullable|mimes:pdf,doc,docx,xlsx,xls|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'cv_url.mimes' => trans('validation.mimes'),
            'cv_url.max' => trans('validation.max'),
        ];
    }
}
