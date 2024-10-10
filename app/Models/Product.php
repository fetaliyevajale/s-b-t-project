<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the basket products associated with the product.
     */
    public function basketProducts()
    {
        return $this->hasMany(BasketProduct::class);
    }
}
