<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'delivery_personnel_id',
        'quantity',
        'total_price',
        'status',
        'shipping_address',
    ];

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function deliveryPersonnel()
    {
        return $this->belongsTo(DeliveryPersonnel::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public static function DeliveredOrders(): int
    {
        return self::where('status', 'delivered')->count();
    }

    public static function PendingOrders(): int
    {
        return self::where('status', 'in_transit')->count();
    }

    public static function Quantity($orderId)
    {
        return Purchase::where('order_id', $orderId)->sum('quantity');
    }
}
