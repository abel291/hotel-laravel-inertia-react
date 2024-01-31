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
                'name' => 'Cama pequeña',
                'icon' => '/img/beds/cama-pequena.png'
            ],
            [
                'name' => 'Cama grande',
                'icon' => '/img/beds/cama-grande.png'
            ],
            [
                'name' => 'Sofa cama',
                'icon' => '/img/beds/sofa.png'
            ],

        ];
        foreach ($beds as $key => $bed) {
            Bed::factory()->create($bed);
        }
    }
}
