<?php

namespace App\DTO\Auth;

use Spatie\LaravelData\Data;

class ResetPasswordDTO extends Data
{
    public string $email;

    public string $password;

    public string $passwordConfirmation;

    public string $token;
}
