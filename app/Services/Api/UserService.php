<?php

namespace App\Services\Api;

use App\Http\Resources\UserResource;
use App\Models\User;

/**
 * Class AuthService.
 */
class UserService
{
    public function findUserById(int $id): UserResource
    {
        return new UserResource(User::with('balance')->findOrFail($id));
    }
}
