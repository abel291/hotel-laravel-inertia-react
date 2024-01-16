<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::truncate();

        $pages = [
            'Home',
            'Blog',
            'Rooms',
            'Contact',
            'Services',
            'About',
            'Gallery',
            'FAQ',
            'Opinions',
        ];
        foreach ($pages as $key => $page_title) {
            Page::factory()->create([
                'title' => $page_title,
                'type' => Str::slug($page_title),
                'img' => '/img/pages/page_' . Str::slug($page_title) . '.png',
            ]);
        }
    }
}
