<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:30',
                'unique:users',
            ],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
            ],
            'username' => [
                'required',
                'max:40',
            ],
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

    public function getUsername() : string
    {
        return $this->input('username');
    }
}
