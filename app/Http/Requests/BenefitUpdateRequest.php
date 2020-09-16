<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BenefitUpdateRequest extends FormRequest
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
            'name' => 'required|unique:benefits,name,' . $this->id,
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'uinique' => trans('validation.unique'),
            'image.mimes' => trans('validation.mimes'),
            'image.max' => trans('validation.max'),
        ];
    }
}
