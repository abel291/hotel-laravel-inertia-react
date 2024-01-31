<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();

        $tags = Tag::select('id')->get();
        $categories = Category::select('id')->get();

        Blog::factory(10)
            ->state(function (array $attributes) use ($categories) {
                return [
                    'category_id' => $categories->random()->id,
                ];
            })
            ->create()
            ->each(function (Blog $blog) use ($tags) {
                $blog->tags()->sync($tags->random(2));
            });

        Blog::inRandomOrder()->limit(3)->update(['home' => 1]);
    }
}
