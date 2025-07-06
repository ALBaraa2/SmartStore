<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'category',
        'brand',
        'country_of_origin',
        'barcode',
        'expiry_date'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    protected static function booted()
    {
        static::updated(
            fn() => cache()->flush()
        );
        static::deleted(
            fn() => cache()->flush()
        );
        static::created(
            fn() => cache()->flush()
        );
    }
}
