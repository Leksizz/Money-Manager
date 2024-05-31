<?php

namespace App\DTO\User;

use Spatie\LaravelData\Data;

class UpdateDTO extends Data
{
    public string $name;

    public string $lastname;

    public string $email;

    public int $currency_id;
}
