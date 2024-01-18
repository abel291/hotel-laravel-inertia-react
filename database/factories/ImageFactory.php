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
            "img" => '/img/image-' . rand(0, 20) . '.jpg',
            "thumb" => '/img/thumbnail/image-' . rand(0, 20) . '.jpg',
        ];
    }
}
