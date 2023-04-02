<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            return [
                'name' => fake()->sentence(6),
                'is_active' => rand(1,0),
                'price' => fake()->numberBetween(10,800),
                'description' => fake()->text(200),
            ];
    
    }
}
