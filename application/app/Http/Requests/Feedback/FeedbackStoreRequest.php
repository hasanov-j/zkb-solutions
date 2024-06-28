<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'message' => [
                'required',
                'string',
            ],
            'review_id' => [
                'required',
                'numeric',
            ],
        ];
    }

    public function getMessage(): string
    {
        return $this->input('message');
    }

    public function getReviewId(): int
    {
        return (int) $this->input('review_id');
    }
}
