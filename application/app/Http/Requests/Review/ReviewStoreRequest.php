<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string',
            ],
        ];
    }

    public function getMessage(): string
    {
        return $this->input('message');
    }
}
