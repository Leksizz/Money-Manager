<?php

namespace App\Http\Controllers;

use App\DTO\User\UpdateDTO;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function edit(User $user): View
    {
        return view('user.settings', compact('user'));
    }

    /**
     * @throws Exception
     */
    public function update(UpdateRequest $request, User $user): RedirectResponse
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

