<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmService
{
    public function isConfirmedPassword(Request $request): bool
    {
        return Hash::check($request->password, $request->user()->password);
    }
}
