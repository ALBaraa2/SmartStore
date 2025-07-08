<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DeliveryPersonnel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => User::where('role', 'customer')->inRandomOrder()->first()?->id ?? User::factory()->create(['role' => 'customer']),
            'delivery_personnel_id' => DeliveryPersonnel::inRandomOrder()->first()?->id ?? DeliveryPersonnel::factory(),
            'status' => $this->faker->randomElement(['delivered', 'returned', 'cancelled', 'in_transit']),
            'shipping_address' => $this->faker->address(),
            'total_price' => 0, // Will be updated after purchases
        ];
    }
}
