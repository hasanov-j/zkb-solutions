<?php

namespace App\Repository\Review;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewStaticRepository
{
    public static function getAllByUserWithPaginate(
        User $user,
        int $elementCount = 5
    ): LengthAwarePaginator {
        return Review::where('user_id', $user->getId())
            ->paginate($elementCount);
    }
}