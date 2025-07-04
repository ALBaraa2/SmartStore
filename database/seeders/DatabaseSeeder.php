<?php

namespace Database\Seeders;

use App\Models\DeliveryPersonnel;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate Users
        User::factory(3)->create();

        // Generate Products
        Product::factory(10)->create();

        // Generate Delivery Personnel
        DeliveryPersonnel::factory(1)->create();

        // Generate Orders
        Order::factory(15)->create();

        // Generate Payments
        Payment::factory(15)->create();

        // Generate Cart Items
        Cart::factory(20)->create();
    }
}