<?php

namespace App\Http\Controllers;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $DTO = RegisterDTO::from($validatedData);

        $this->authService->register($DTO);

        return redirect()->route('verification.notice');
    }

    /**
     * Display the specified resource.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = LoginDTO::from($validatedData);

        if (AuthService::attempt($DTO, $request)) {
            return redirect()->intended('/users/dashboard');
        }

        AuthService::regenerateSession($request);

        return back()->with('message', 'Неверный логин или пароль');
    }

    public function destroy(Request $request)
    {
        AuthService::destroySession($request);

        return redirect('/');
    }
}
