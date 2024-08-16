<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VacationSpot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'latitude',
        'longitude',
    ];

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
