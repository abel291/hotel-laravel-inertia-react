<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();
        Tag::truncate();

        $categories = [
            'Turismo',
            'Gastronomia',
            'Viajes',
            'Experiencias',
            'Comunicación',
        ];
        foreach ($categories as $key => $category) {
            Category::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }

        $tags = [
            'Viajar',
            'Habitación',
            'Gente',
            'Guía',
            'Estación',
            'Ciudad',
            'Monumentos',
        ];
        foreach ($tags as $key => $tag) {
            Tag::factory()->create([
                'name' => $tag,
                'slug' => Str::slug($tag)
            ]);
        }
    }
}
