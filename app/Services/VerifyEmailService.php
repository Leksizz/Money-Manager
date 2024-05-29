<?php

namespace App\Services;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailService
{
    public function verifyEmail(EmailVerificationRequest $request): void
    {
        $request->fulfill();
    }

    public function resentVerifyEmail(Request $request): void
    {
        $request->user()->sendEmailVerificationNotification();
    }
}
