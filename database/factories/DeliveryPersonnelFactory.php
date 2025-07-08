<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryPersonnel>
 */
class DeliveryPersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::where('role', 'delivery_personnel')->inRandomOrder()->first()?->id ?? User::factory()->create(['role' => 'delivery_personnel'])->id,
            'name' => $this->faker->name(),
            'number_of_orders' => $this->faker->numberBetween(0, 50),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'rate' => $this->faker->numberBetween(10, 100),
        ];
    }
}
