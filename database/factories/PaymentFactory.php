<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'order_id' => \App\Models\Order::factory(),
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'paypal', 'bank_transfer']),
            'payment_status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'amount' => function (array $attributes) {
                return \App\Models\Order::find($attributes['order_id'])->total_price;
            },
        ];
    }
}
