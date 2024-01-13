<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();
        Tag::truncate();

        $tags = Tag::factory()->count(20)->create();
        Blog::factory(40)->create()
            ->each(function (Blog $blog) use ($tags) {
                $blog->tags()->sync($tags->random(5));
            });
    }
}
