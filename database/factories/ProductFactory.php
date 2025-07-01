<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'category' => $this->faker->randomElement([
                'Groceries', 'Dairy & Eggs', 'Bakery & Snacks', 'Beverages', 
                'Household Essentials', 'Personal Care', 'Health & Wellness',
                'Meat & Seafood', 'Frozen Foods', 'Baby Care', 'Others'
            ]),
            'brand' => $this->faker->company(),
            'country_of_origin' => $this->faker->country(),
            'barcode' => $this->faker->ean13(),
            'expiry_date' => $this->faker->dateTimeBetween('+1 week', '+2 years'),
        ];
    }
}
