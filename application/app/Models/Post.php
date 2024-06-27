<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'posted_at',
        'description',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getPostedAt(): Carbon
    {
        return Carbon::parse($this->posted_at);
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
