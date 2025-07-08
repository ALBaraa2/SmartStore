<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::inRandomOrder()->first()?->id ?? Order::factory()->create()->id,
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'paypal', 'bank_transfer']),
            'payment_status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'amount' => function (array $attributes) {
                return Order::find($attributes['order_id'])->total_price;
            },
        ];
    }
}
