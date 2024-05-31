<?php

namespace App\Http\Controllers;

use App\DTO\User\UpdateDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function edit(User $user)
    {
        return view('user.settings', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $validatedData = $request->validated();
        $DTO = UpdateDTO::from($validatedData);

        $this->userService->updateUser($DTO, $user);
        return back()->with(['status' => 'Данные успешно обновлены']);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->userService->deleteUser($user);

        return redirect('/');
    }
}

