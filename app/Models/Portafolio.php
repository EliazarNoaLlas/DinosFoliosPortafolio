<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portafolio extends Model
{
    use HasFactory;


    public function portafolioitems(): HasMany
    {
        return $this->hasMany(Portafolioitem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function semestre(): BelongsTo
    {
        return $this->belongsTo(Semestre::class);
    }

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }    
}
