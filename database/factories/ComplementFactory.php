<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complement>
 */
class ComplementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->words(3, true),
            "icon" => '/img/complements/complement-' . rand(0, 12) . '.png',
            "price" => fake()->numberBetween(1, 10),
            "type_price" => fake()->randomElement(['reservation', 'night']),
            'entry' => fake()->text(100),

        ];
    }
}
