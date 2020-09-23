<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainMemberUpdateRequest extends FormRequest
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
            'name' => 'required|unique:main_member,name,' . $this->main_member,
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'position' => 'required',
            'quote' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'unique' => trans('validation.unique'),
            'avatar.mimes' => trans('validation.mimes'),
            'avatar.max' => trans('validation.max'),
        ];
    }
}
