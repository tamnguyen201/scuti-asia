<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'confirmed' => trans('validation.confirmed'),
            'min' => trans('validation.min'),
        ];
    }
}
