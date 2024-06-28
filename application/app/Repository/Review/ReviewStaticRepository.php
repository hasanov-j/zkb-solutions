<?php

namespace App\Repository\Review;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewStaticRepository
{
    public static function getAllWithPaginate(
        int $elementCount = 5
    ): LengthAwarePaginator {
        return Review::paginate($elementCount);
    }
}