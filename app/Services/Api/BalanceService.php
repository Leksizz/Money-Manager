<?php

namespace App\Services\Api;

use App\DTO\Date\DateDTO;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use voku\helper\ASCII;

class BalanceService
{
    public function today(HasMany $type): Collection
    {
        return $type->with('category')->whereDate('updated_at', Carbon::today())->get();
    }

    public function week(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfWeek();
        $end = Carbon::today()->endOfWeek();

        return $this->getPeriod($type, $start, $end);
    }

    public function month(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->endOfMonth();

        return $this->getPeriod($type, $start, $end);
    }

    public function year(HasMany $type): Collection
    {
        $start = Carbon::today()->startOfYear();
        $end = Carbon::today()->endOfYear();

        return $this->getPeriod($type, $start, $end);
    }

    public function all(HasMany $type): Collection
    {
        return $type->with('category')->get();
    }

    public function period(HasMany $type, DateDTO $DTO): Collection
    {
        $start = $DTO->start;
        $end = $DTO->end;

        return $this->getPeriod($type, $start, $end);
    }

    private function getPeriod(HasMany $type, string $start, string $end): Collection
    {
        return $type->with('category')->whereBetween('updated_at', [$start, $end])->get();
    }
}
