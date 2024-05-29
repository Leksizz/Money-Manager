<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balance extends Model
{

    protected $fillable = [
        'user_id',
        'amount',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function income(): HasMany
    {
        return $this->hasMany(Income::class);
    }

    public function expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function totalAmount(): mixed
    {
        return $this->income()->sum('amount') - $this->expense()->sum('amount');
    }

    use HasFactory;
}
