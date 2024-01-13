<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Complement;
use App\Models\Image;
use App\Models\Room;
use App\Models\Service;
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

        $services = Service::get();
        $beds = Bed::get();
        $complements = Complement::get();

        Room::factory()->count(10)
            ->has(Image::factory()->count(5))
            ->create()
            ->each(function (Room $room) use ($services, $beds, $complements) {
                $room->services()->sync($services->random(rand(6, 12)));
                $room->beds()->sync($beds->random(rand(1, 3)));
                $room->complements()->sync($complements->random(rand(5, 10)));
            });
    }
}
