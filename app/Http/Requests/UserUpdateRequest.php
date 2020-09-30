<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone' => ['required','digits:10','regex:/(02|03|07|08|09)+([0-9]{8})\b/'],
            'address' => 'required',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
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
            'avatar.mimes' => trans('validation.mimes'),
            'max' => trans('validation.max'),
        ];
    }
}
