<?php

namespace App\Services;

use App\DTO\User\UpdateDTO;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Number;

class UserService
{
    /**
     * @throws \Exception
     */
    public function updateUser(UpdateDTO $DTO, User $user): void
    {
        try {
            DB::transaction(function () use ($DTO, $user) {
                if ($this->isNewEmail($DTO, $user)) {
                    $user->email_verified_at = null;
                }

                $user->update([
                    'name' => $DTO->name,
                    'lastname' => $DTO->lastname,
                    'email' => $DTO->email,
                ]);

                $user->balance()->update([
                    'currency_id' => $DTO->currency_id
                ]);
            });
        } catch (\Exception $e) {
            Log::error('Error updating user and balance: ', ['exception' => $e]);
            throw $e;
        }
    }

    private function isNewEmail(UpdateDTO $DTO, User $user): bool
    {
        if ($DTO->email === $user->email) {
            return false;
        }
        return true;
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
        Auth::logout();
    }
}
