<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewResourceCollection extends ResourceCollection
{
    public function toArray(Request $request)
    {
        return ReviewResource::collection($this->collection);
    }
}
