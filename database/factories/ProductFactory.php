<?php

namespace Database\Factories;

use App\Infrastructure\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(rand(1, 2), true),
            'description' => fake()->words(rand(3, 10), true),
            'price' => fake()->numberBetween(100, 1000),
        ];
    }
}
