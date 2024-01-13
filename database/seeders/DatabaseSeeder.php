<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bed;
use App\Models\Blog;
use App\Models\Complement;
use App\Models\Discount;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Page;
use App\Models\Room;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Image::truncate();
        $this->call([
            BlogSeeder::class,
            BedSeeder::class,
            ServiceSeeder::class,
            ComplementSeeder::class,
            DiscountSeeder::class,
            GallerySeeder::class,
            PageSeeder::class,
            RoomSeeder::class,
            UserSeeder::class,
            ReservationSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
