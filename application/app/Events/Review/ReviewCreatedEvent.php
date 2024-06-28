<?php

namespace App\Events\Review;

use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        private Review $review,
    ) {
        //
    }


    public function broadcastOn(): array
    {
        return [
            new Channel('review_created'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'review_created';
    }

    public function broadcastWith(): array
    {
        return [
            'review' => new ReviewResource($this->review),
        ];
    }
}
