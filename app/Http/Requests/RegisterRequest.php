<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('messages.first-name-required'),
            'last_name.required' => __('messages.last-name-required'),
            'email.required' => __('messages.email-required'),
            'email.unique' => __('messages.email-unique'),
            'phone.required' => __('messages.phone-required'),
            'password.required' => __('messages.password-required'),
            'confirm_password.required' => __('messages.conf-pass-required'),
            'confirm_password.confirmed' => __('messages.password-match'),
            'password.min' => __('messages.password-short'),
            'confirm_password.min' => __('messages.password-short')
        ];
    }
}
