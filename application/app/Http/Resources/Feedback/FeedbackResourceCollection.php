<?php

namespace App\Http\Resources\Feedback;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedbackResourceCollection extends ResourceCollection
{
    public function toArray(Request $request)
    {
        return FeedbackResource::collection($this->collection);
    }
}
