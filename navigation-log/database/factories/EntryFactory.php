<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locations_id' => fake()->numberBetween(1,5),
            'user_id' => fake()->numberBetween(1,5),
            'category_id' => fake()->numberBetween(1,5),
            'title' => fake()->text(),
            'entry' => fake()->text(3000)
        ];
    }
}
