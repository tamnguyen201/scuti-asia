<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            // 'phone' => 'required|regex:/(09|01[2|6|8|9])+([0-9]{8})\b/g',
            // 'address' => 'required',
            // 'avatar' => 'sometimes|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            // 'mimes' => trans('validation.mimes'),
            // 'max' => trans('validation.max'),
        ];
    }
}
