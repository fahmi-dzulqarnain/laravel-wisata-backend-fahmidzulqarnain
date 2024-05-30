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
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 100000),
            'stock' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->numberBetween(1, 2),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['archived', 'draft', 'published']),
            'criteria' => $this->faker->randomElement(['perorangan', 'grup']),
            'is_favorite' => $this->faker->boolean,
        ];
    }
}
