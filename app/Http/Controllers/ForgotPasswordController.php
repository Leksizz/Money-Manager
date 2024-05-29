<?php

namespace App\Http\Controllers;

use App\DTO\Auth\ForgotPasswordDTO;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Services\ForgotPasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    public ForgotPasswordService $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }

    public function create()
    {
        return view('auth.forgotPassword');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $validatedData = $request->validated();
        $DTO = ForgotPasswordDTO::from($validatedData);

        $status = $this->forgotPasswordService->getStatusResetLink($DTO);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()->withInput(['email' => $DTO->email])->withErrors(['email' => trans($status)]);
    }
}
