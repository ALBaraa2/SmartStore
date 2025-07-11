<?php

namespace Database\Seeders;

use App\Models\DeliveryPersonnel;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Purchase;
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
        User::factory(30)->create();

        // Generate Products
        Product::factory(20)->create();

        // Generate Delivery Personnel
        DeliveryPersonnel::factory(5)->create();

        Order::factory(20)->create()->each(function ($order) {
            $total = 0;
            
            // Create 2–4 purchases for each order
            $purchases = Purchase::factory(rand(2, 4))->make();
            
            foreach ($purchases as $purchase) {
                $purchase->order_id = $order->id;
                $purchase->save();
                
                $total += $purchase->total_price_at_purchase;
            }
            
            $order->update(['total_price' => $total]);
        });
        
        // Generate Cart Items
        Cart::factory(20)->create();
        

        // Generate Payments
        Payment::factory(20)->create();
    }
}