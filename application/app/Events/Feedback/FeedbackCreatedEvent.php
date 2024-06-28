<?php

namespace App\Events\Feedback;

use App\Http\Resources\Feedback\FeedbackResource;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FeedbackCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;
    private Feedback $feedback;

    public function __construct(
         Feedback $feedback
    ) {
        $this->feedback = $feedback;
        $this->user = $feedback->getReview()->getUser();
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("feedback_created_{$this->user->getId()}"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'feedback_created';
    }

    public function broadcastWith(): array
    {
        return [
            'feedback' => new FeedbackResource($this->feedback),
        ];
    }
}
