<?php

namespace App\Services;

use App\DTO\Auth\ForgotPasswordDTO;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService
{
    public function getStatusResetLink(ForgotPasswordDTO $DTO): string
    {
        return Password::sendResetLink(['email' => $DTO->email]);
    }
}
