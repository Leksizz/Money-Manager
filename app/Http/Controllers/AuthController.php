<?php

namespace App\Http\Controllers;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function index(): View
    {
        return view('auth.login');
    }


    public function create(): View
    {
        return view('auth.register');
    }


    public function store(RegisterRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = RegisterDTO::from($validatedData);

        $this->authService->register($DTO);

        return redirect()->route('verification.notice');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = LoginDTO::from($validatedData);

        if (AuthService::attempt($DTO, $request)) {
            return redirect()->intended('/balance/' . Auth::id());
        }

        AuthService::regenerateSession($request);

        return back()->with('message', 'Неверный логин или пароль');
    }

    public function destroy(Request $request): RedirectResponse
    {
        AuthService::destroySession($request);

        return redirect('/');
    }
}
