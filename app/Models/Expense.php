<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{

    protected $fillable = [
        'amount',
        'category_id',
        'balance_id',
    ];

    public function balance(): BelongsTo
    {
        return $this->belongsTo(Balance::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    use HasFactory;
}
