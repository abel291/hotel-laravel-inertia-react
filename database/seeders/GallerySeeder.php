<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::truncate();
        $galleries = [
            'Cocina',
            'Piscina',
            'Habitaciones',
            'Gastronomía',
            'Salones',
            'Zonas comunes',
        ];
        foreach ($galleries as $key => $gallery_name) {
            Gallery::factory()
                ->has(Image::factory()->count(12))
                ->create([
                    'name' => $gallery_name,
                    'slug' => Str::slug($gallery_name),
                ]);
        }
    }
}
