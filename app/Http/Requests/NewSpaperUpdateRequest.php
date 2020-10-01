<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSpaperUpdateRequest extends FormRequest
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
            'title' => 'required|unique:new_spapers,title,' . $this->new_spaper,
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'url' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'mimes' => trans('validation.mimes'),
            'max' => trans('validation.max'),
        ];
    }
}
