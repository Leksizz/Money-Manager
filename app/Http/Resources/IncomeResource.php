<?php

namespace App\Http\Resources;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'amount' => $this->amount,
            'category' => new IncomeCategoryResource($this->category),
        ];
    }
}
