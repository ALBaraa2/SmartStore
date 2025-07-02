<?php

namespace Database\Factories;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => User::factory()->create(['role' => 'customer'])->id,
            'product_id' => Product::factory()->create()->id,
        ];
    }
}
