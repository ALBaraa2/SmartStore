<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPersonnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'number_of_orders',
        'status',
        'rate',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
