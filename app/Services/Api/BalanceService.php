<?php

namespace App\Services\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BalanceService
{
    public function today(HasMany $type): Collection
    {
        return $type->with('category')->whereDate('created_at', Carbon::today())->get();
    }

    public function week(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfWeek();
        $end = Carbon::today()->endOfWeek();

        return $type->with('category')->whereBetween('created_at', [$start, $end])->get();
    }

    public function month(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->endOfMonth();

        return $type->with('category')->whereBetween('created_at', [$start, $end])->get();
    }

    public function year(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfYear();
        $end = Carbon::today()->endOfYear();

        return $type->with('category')->whereBetween('created_at', [$start, $end])->get();
    }

    public function all(HasMany $type): Collection
    {
        return $type->with('category')->get();
    }
}
