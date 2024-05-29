<?php

namespace App\DTO\Auth;

use Spatie\LaravelData\Data;

class LoginDTO extends Data
{
    public string $email;

    public string $password;
}
