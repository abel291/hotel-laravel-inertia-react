<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Complement;
use App\Models\Image;
use App\Models\Offer;
use App\Models\Room;
use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::truncate();

        $amenities = Amenity::get();
        $beds = Bed::get();
        $complements = Complement::get();

        Room::factory()->count(8)
            ->has(Image::factory()->count(5))
            ->create()
            ->each(function (Room $room) use ($amenities, $beds, $complements) {
                $room->amenities()->sync($amenities->random(rand(10, 14)));
                $room->beds()->syncWithPivotValues($beds->random(2), ['quantity' => rand(1, 2)]);
                $room->complements()->sync($complements->random(rand(5, 10)));
            });

        Room::inRandomOrder()->limit(2)->update(['home' => true]);
        Room::inRandomOrder()->limit(3)->update(['about' => true]);
    }
}
