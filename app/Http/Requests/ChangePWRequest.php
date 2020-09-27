<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePWRequest extends FormRequest
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
            'new_password'=>'required',
            'new_confirm_password'=>'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
        ];
    }
}
