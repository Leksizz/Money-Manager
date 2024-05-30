<?php

namespace App\Http\Controllers;

use App\DTO\User\UpdateDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Services\UserService;

//use Faker\Core\Number;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('user.dashboard', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.settings', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $DTO = UpdateDTO::from($validatedData);

        $this->userService->updateUser($DTO, $user);
        return back()->with(['status' => 'Данные успешно обновлены']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userService->deleteUser($user);

        return redirect('/');
    }
}

