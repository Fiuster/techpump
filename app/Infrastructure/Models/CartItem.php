<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
