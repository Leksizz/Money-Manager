<?php

namespace App\Services;

use App\DTO\User\UpdateDTO;
use App\Models\User;

class UserService
{
    public function updateUser(UpdateDTO $DTO, User $user): void
    {
        if ($this->isNewEmail($DTO, $user)) {
            $user->email_verified_at = null;
        }

        $user->update(
            [
                'name' => $DTO->name,
                'lastname' => $DTO->lastname,
                'email' => $DTO->email,
                'email_verified_at' => $user->email_verified_at,
            ]);
    }

    private function isNewEmail(UpdateDTO $DTO, User $user): bool
    {
        if ($DTO->email === $user->email) {
            return false;
        }
        return true;
    }
}
