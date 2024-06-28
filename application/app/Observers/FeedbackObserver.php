<?php

namespace App\Observers;

use App\Events\Feedback\FeedbackCreatedEvent;
use App\Models\Feedback;

class FeedbackObserver
{
    public function created(Feedback $feedback)
    {
        broadcast(new FeedbackCreatedEvent($feedback))->toOthers();
    }
}
