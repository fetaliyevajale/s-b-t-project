<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory; // HasFactory istifadəsi

    /**
     * Get the user that owns the basket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the basket products associated with the basket.
     */
    public function basketProducts()
    {
        return $this->hasMany(BasketProduct::class);
    }
}
