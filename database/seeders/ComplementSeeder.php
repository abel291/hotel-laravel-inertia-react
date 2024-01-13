<?php

namespace Database\Seeders;

use App\Models\Complement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complement::truncate();
        Complement::factory()->count(20)->create();
    }
}
