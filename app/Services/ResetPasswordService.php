<?php

namespace App\Services;

use App\DTO\Auth\ResetPasswordDTO;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordService
{
    public function getStatusReset(ResetPasswordDTO $DTO)
    {
        return Password::reset(
            ['email' => $DTO->email,
                'password' => $DTO->password,
                'token' => $DTO->token],
            function ($user) use ($DTO) {
                $user->forceFill([
                    'password' => Hash::make($DTO->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );
    }
}
