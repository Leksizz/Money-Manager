<?php

namespace App\Http\Controllers;

use App\Services\VerifyEmailService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{

    private VerifyEmailService $verifyEmailService;

    public function __construct(VerifyEmailService $verifyEmailService)
    {
        $this->verifyEmailService = $verifyEmailService;
    }

    public function index(): View
    {
        return view('auth.verifyEmail');
    }

    public function create(EmailVerificationRequest $request): RedirectResponse
    {
        $this->verifyEmailService->verifyEmail($request);
        return redirect()->intended('/balance/' . Auth::id());
    }

    public function store(Request $request): RedirectResponse
    {
        $this->verifyEmailService->resentVerifyEmail($request);
        return back()->with('message', 'Повторная ссылка была отправлена!');
    }
}
