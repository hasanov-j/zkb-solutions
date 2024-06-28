<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:30',
                'exists:users',
            ],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Please first register in the application',
        ];
    }
    public function getEmail() : string
    {
        return $this->input('email');
    }

    public function getPassword() : string
    {
        return $this->input('password');
    }
}
