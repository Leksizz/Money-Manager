<?php

namespace App\Http\Controllers;

use App\Services\PasswordConfirmService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PasswordConfirmController extends Controller
{

    public PasswordConfirmService $passwordConfirmService;

    public function __construct(PasswordConfirmService $passwordConfirmService)
    {
        $this->passwordConfirmService = $passwordConfirmService;
    }

    public function show(): View
    {
        return view('user.confirmPassword');
    }

    public function store(Request $request): RedirectResponse
    {
        if ($this->passwordConfirmService->isConfirmedPassword($request)) {
            $request->session()->passwordConfirmed();

            return redirect()->intended('/users/settings/' . Auth::id());
        }

        return back()->withErrors([
            'password' => 'Неправильный пароль',
        ]);
    }
}
