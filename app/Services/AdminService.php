<?php

namespace App\Services;

use App\DTO\Admin\AdminDTO;
use App\Models\News;
use App\Models\User;

class AdminService
{
    public static function getUsersPaginate(int $num)
    {
        return User::paginate($num);
    }

    public function updateUser(AdminDTO $DTO, User $user): void
    {
        $user->update([
            'name' => $DTO->name,
            'lastname' => $DTO->lastname,
            'email' => $DTO->email,
        ]);
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }

    public static function getNewsPaginate(int $num)
    {
        return News::paginate($num);
    }
}
