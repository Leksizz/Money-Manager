<?php

namespace App\DTO\Auth;

use Spatie\LaravelData\Data;

class ForgotPasswordDTO extends Data
{
    public string $email;
}
