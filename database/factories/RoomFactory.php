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
        $price = fake()->numberBetween(16, 50);
        return [
            "name" => fake()->words(3, true),
            "slug" => Str::slug(fake()->words(3, true)),
            "entry" => fake()->text(100),
            "description" => fake()->text(400),
            "active" => 1,
            "quantity" => fake()->numberBetween(5, 15),
            "adults" => fake()->numberBetween(3, 9),
            "kids" => fake()->numberBetween(0, 2),
            "price" => $price,
            "img" => '/img/rooms/room-' . rand(0, 10) . '.jpg',
            "thum" => '/img/rooms/room-' . rand(0, 10) . '.jpg',
        ];
    }
}
