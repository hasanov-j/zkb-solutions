<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostResponse extends Model
{
    use HasFactory;

    protected $table = 'post_responses';

    protected $fillable = [
        'post_id',
        'responded_at',
        'description',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function getRespondedAt(): Carbon
    {
        return Carbon::parse($this->responded_at);
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
