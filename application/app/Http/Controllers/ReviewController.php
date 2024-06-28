<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\ReviewIndexRequest;
use App\Http\Requests\Review\ReviewStoreRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\Review\ReviewResourceCollection;
use App\Models\Review;
use App\Repository\Review\ReviewStaticRepository;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewStoreRequest $request): ReviewResource
    {
        /** @var Review $review */
        $review = Review::create([
            'user_id' => $request->user()->getId(),
            'message' => $request->getMessage(),
            'reviewed_at' => now(),
        ]);

        return new ReviewResource($review);
    }

    public function index(ReviewIndexRequest $request): ReviewResourceCollection
    {
        $reviews = ReviewStaticRepository::getAllByUserWithPaginate(
            $request->user(),
        );

        return new ReviewResourceCollection($reviews);
    }
}
