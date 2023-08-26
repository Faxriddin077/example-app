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
            'name' => fake()->lexify('product-????'),
            'price' => fake()->randomNumber(6, true),
            'main_image' => fake()->shuffle('product_main_image') . '.jpg',
            'status' => fake()->randomElement([0, 1]),
        ];
    }
}
