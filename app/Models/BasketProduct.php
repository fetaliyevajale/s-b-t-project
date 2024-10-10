<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
    use HasFactory; // HasFactory istifadəsi

    /**
     * Get the basket that owns the basket product.
     */
    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }

    /**
     * Get the product associated with the basket product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
