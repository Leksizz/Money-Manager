<?php

namespace App\Http\Controllers;

use App\DTO\Auth\ResetPasswordDTO;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Services\ResetPasswordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{

    public ResetPasswordService $resetPasswordService;

    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function create(Request $request): View
    {
        return view('auth.resetPassword', ['request' => $request]);
    }

    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = ResetPasswordDTO::from($validatedData);

        $status = $this->resetPasswordService->getStatusReset($DTO);

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }

        return back()->withInput(['email' => $DTO->email])
            ->withErrors(['email' => 'Некорректный имейл']);
    }
}
