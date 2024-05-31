<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    protected $fillable = [
        'code',
    ];

    public function balances(): HasMany
    {
        return $this->hasMany(Balance::class);
    }

    use HasFactory;
}
