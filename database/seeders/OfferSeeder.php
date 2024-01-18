<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Offer::truncate();
        $offers = [
            [
                'nights' => 7,
                'percent' => 5,
            ],
            [
                'nights' => 10,
                'percent' => 10,
            ],
            [
                'nights' => 15,
                'percent' => 15,
            ],
            [
                'nights' => 20,
                'percent' => 20,
            ],
            [
                'nights' => 25,
                'percent' => 25,
            ],
            [
                'nights' => 30,
                'percent' => 30,
            ]
        ];
        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}
