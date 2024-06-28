<?php

namespace App\Observers;

use App\Events\Review\ReviewCreatedEvent;
use App\Models\Review;
use Illuminate\Support\Facades\Broadcast;

class ReviewObserver
{
    public function created(Review $review)
    {
        broadcast(new ReviewCreatedEvent($review))->toOthers();
    }
}
