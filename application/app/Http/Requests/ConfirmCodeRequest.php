<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone_code' => [
                'required',
                'regex:/[0-9]{6}/',
                'exists:users,phone_code',
            ],
            'phone_number' => [
                'required',
                "regex:/^\+{1}[0-9]{8,15}$/",
                'exists:users,phone_number',
            ],
            'device_id' => [
                'required',
                'string',
                'max:255',
            ],
            'device_push_token' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone_code' => 'The PIN code you entered is incorrect.',
            'phone_number.exists' => 'Please first register in the application. The user with this phone number is not registered yet.',
        ];
    }

    public function getPhoneNumber() : string
    {
        return $this->input('phone_number');
    }

    public function getPhoneCode() : string
    {
        return $this->input('phone_code');
    }

    public function getDeviceId(): string
    {
        return $this->input('device_id');
    }

    public function getDevicePushToken(): ?string
    {
        return $this->input('device_push_token');
    }
}
