<?php

namespace App\Http\Resources\Feedback;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Feedback $data */
        $data = $this->resource;

        return [
            'id'=> $data->getId(),
            'message' => $data->getMessage(),
            'answered_at' => $data->getAnsweredAt()->toString(),
        ];
    }
}
