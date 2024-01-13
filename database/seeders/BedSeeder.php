<?php

namespace Database\Seeders;

use App\Models\Bed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bed::truncate();
        $beds = [
            [
                'title' => 'Litera',
                'icon' => '/img/beds/litera.png'
            ],
            [
                'title' => 'Cama pequeña',
                'icon' => '/img/beds/cama-pequena.png'
            ],
            [
                'title' => 'Cama grande',
                'icon' => '/img/beds/cama-grande.png'
            ],
            [
                'title' => 'Sofa cama',
                'icon' => '/img/beds/sofa-cama.png'
            ],
            [
                'title' => 'Hamaca',
                'icon' => '/img/beds/hamaca.png'
            ],
        ];
        foreach ($beds as $key => $bed) {
            Bed::factory()->create($bed);
        }
    }
}
