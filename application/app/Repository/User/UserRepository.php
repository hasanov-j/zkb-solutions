<?php

namespace App\Repository\User;

use App\Models\User;

class UserRepository
{
    public function findByEmail(
        string $email,
    ): ?User {
        return User::where('email', $email)->first();
    }

    public function getByEmail(
        string $email
    ): User {
        return User::where('email', $email)->first();
    }
}