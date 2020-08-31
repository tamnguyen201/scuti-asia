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
            'name' => 'required',
            'email' => 'required|email',
            // 'logo' => 'required|mimes:application/pdf|max:10000',
            'leter' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
        ];
    }
}
