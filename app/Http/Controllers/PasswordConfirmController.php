<?php

namespace App\Http\Controllers;

use App\Services\PasswordConfirmService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordConfirmController extends Controller
{

    public PasswordConfirmService $passwordConfirmService;

    public function __construct(PasswordConfirmService $passwordConfirmService)
    {
        $this->passwordConfirmService = $passwordConfirmService;
    }

    public function show()
    {
        return view('user.confirmPassword');
    }

    public function store(Request $request)
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
