<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'entry' => fake()->sentence(),
            'description' => fake()->text(300),
            'img' => '/img/pages/page.png',
            'seo_title' => fake()->sentence(),
            'seo_desc' => fake()->sentence(),
            'type' => fake()->word(),
        ];
    }
}
