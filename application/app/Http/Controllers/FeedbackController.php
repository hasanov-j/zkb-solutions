<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\FeedbackStoreRequest;
use App\Http\Resources\Feedback\FeedbackResource;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackStoreRequest $request)
    {
        $feedback = Feedback::create([
            'review_id' => $request->getReviewId(),
            'user_id' => $request->user()->getId(),
            'message' => $request->getMessage(),
            'answered_at' => now(),
        ]);

        return new FeedbackResource($feedback);
    }
}
