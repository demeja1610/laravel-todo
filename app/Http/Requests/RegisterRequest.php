<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'email' => __('validation.email_valid'),
            'email.unique' => __('validation.email_unique'),
            'confirmed' => __('validation.password_confirmed'),
            'max' => __('validation.max'),
            'min' => __('validation.min'),
        ];
    }
}
