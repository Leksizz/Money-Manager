<?php

namespace App\DTO\Auth;

use Spatie\LaravelData\Data;

class RegisterDTO extends Data
{
    public string $name;

    public string $lastname;

    public string $email;

    public string $password;
}
