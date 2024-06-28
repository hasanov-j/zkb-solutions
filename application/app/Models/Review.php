<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'message',
        'reviewed_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    protected $with = [
        'feedbacks'
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'review_id', 'id');
    }

    public function getFeedbacks(): Collection
    {
        return $this->feedbacks;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getReviewedAt(): Carbon
    {
        return $this->reviewed_at;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
