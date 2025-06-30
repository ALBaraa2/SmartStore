<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'customer_id' => User::factory()->create(['role' => 'customer']),
            'product_id' => Product::factory(),
            'delivery_personnel_id' => \App\Models\DeliveryPersonnel::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'total_price' => function (array $attributes) {
                return Product::find($attributes['product_id'])->price * $attributes['quantity'];
            },
            'status' => $this->faker->randomElement(['delivered', 'returned', 'cancelled', 'in_transit']),
            'shipping_address' => $this->faker->address(),
        ];
    }
}
