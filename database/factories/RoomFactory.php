<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->numberBetween(16, 20) * 1000;

        return [
            "name" => ucfirst(fake()->words(5, true)),
            "slug" => Str::slug(fake()->words(3, true)),
            "entry" => fake()->text(100),
            "description" => fake()->text(800),
            "quantity" => fake()->numberBetween(5, 15),

            "adults" => fake()->numberBetween(1, 3),
            "kids" => fake()->numberBetween(0, 3),
            "price" => $price,
            "img" => '/img/rooms/room-' . rand(1, 11) . '.jpg',
            "thumb" => '/img/rooms/room-' . rand(1, 11) . '.jpg',
        ];
    }
}
