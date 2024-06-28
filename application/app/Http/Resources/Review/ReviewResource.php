<?php

namespace App\Http\Resources\Review;

use App\Http\Resources\Feedback\FeedbackResourceCollection;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Review $data */
        $data = $this->resource;

        return [
            'id' => $data->getId(),
            'message' => $data->getMessage(),
            'reviewed_at' => $data->getReviewedAt()->toString(),
            'user' => [
                'id' => $data->getUser()->getId(),
                'email' => $data->getUser()->getEmail(),
                'username' => $data->getUser()->getUserName(),
            ],
            'feedbacks' => new FeedbackResourceCollection($data->getFeedbacks()),
        ];
    }
}
