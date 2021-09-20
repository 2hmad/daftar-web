<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name-required'),
            'phone.required' => __('messages.phone-required'),
        ];
    }
}
