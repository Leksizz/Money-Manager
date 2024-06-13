<?php

namespace App\Http\Controllers;

use App\DTO\Admin\AdminDTO;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\User;
use App\Services\AdminService;
use App\Services\NewsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{

    private AdminService $adminService;


    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(): View
    {
        return view('admin.dashboard');
    }

    public function users(): View
    {
        $users = AdminService::getUsersPaginate(10);

        return view('admin.users', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('admin.edit', compact('user'));
    }

    public function update(AdminRequest $request, User $user): RedirectResponse
    {
        $validatedData = $request->validated();
        $DTO = AdminDTO::from($validatedData);

        $this->adminService->updateUser($DTO, $user);

        return back()->with(['status' => 'Данные успешно обновлены']);
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->adminService->deleteUser($user);

        return back();
    }

    public function news(): View
    {
        $posts = AdminService::getNewsPaginate(10);

        return view('admin.news', compact('posts'));
    }

    public function tags(): View
    {
        $tags = NewsService::getTags();

        return view('admin.tags', compact('tags'));
    }
}
