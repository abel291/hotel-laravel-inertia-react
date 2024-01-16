<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
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
            'entry' => fake()->text(100),
            'description' => fake()->randomHtml(),
            'slug' => Str::slug(fake()->sentence()),
            'img' => '/img/posts/post-' . rand(1, 10) . '.jpg',
            'thumb' => '/img/posts/post-' . rand(1, 10) . '.jpg',
            'active' => rand(0, 1),
            'seo_title' => fake()->sentence(),
            'seo_desc' => fake()->sentence(),
        ];
    }
}
