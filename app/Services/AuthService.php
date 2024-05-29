<?php

namespace App\Services;

use App\DTO\Auth\ForgotPasswordDTO;
use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthService
{
    public function register(RegisterDTO $DTO): void
    {
        $user = User::create([
            'name' => $DTO->name,
            'lastname' => $DTO->lastname,
            'email' => $DTO->email,
            'password' => Hash::make($DTO->password),
        ]);

        $this->registerBalance($user);

        event(new Registered($user));

        Auth::login($user);
    }

    private function registerBalance(User $user): void
    {
        Balance::create([
            'user_id' => $user->id,
            'amount' => 0,
        ]);
    }

    public static function attempt(LoginDTO $DTO, Request $request): bool
    {
        return Auth::attempt(['email' => $DTO->email, 'password' => $DTO->password], $request->boolean('remember'));
    }

    public static function regenerateSession(Request $request): void
    {
        $request->session()->regenerate();
    }

    public static function destroySession(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
