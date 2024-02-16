<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "img" => '/img/rooms/room-' . rand(1, 11) . '.jpg',
            "thumb" => '/img/thumbnail/rooms/room-' . rand(1, 11) . '.jpg',
            "alt" => fake()->sentence(),
            "title" => fake()->sentence(),

        ];
    }
}
