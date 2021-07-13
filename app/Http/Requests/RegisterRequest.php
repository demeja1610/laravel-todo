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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Данное поле обязательно',
            'email' => 'Данное поле должно быть корректным email',
            'email.unique' => 'Данный email уже зарегистрирован',
            'confirmed' => 'Пароли должны совпадать',
            'max' => 'Максимальная длинна: :max символов'
        ];
    }
}
