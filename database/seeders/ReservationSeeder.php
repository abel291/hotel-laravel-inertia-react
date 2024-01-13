<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Services\ReservationService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::truncate();

        $users = User::get();
        $rooms = Room::with('complements', 'beds')->get();
        $discounts = Discount::get();

        foreach ($users as $user) {
            $rooms_selected = $rooms->random(2);

            // $discount = $discounts->random();
            foreach ($rooms_selected as $room) {

                $complements = $room->complements->random(2);
                $reservation_date = fake()->dateTimeInInterval('now', '+5 month');
                $start_date = $reservation_date->format('Y-m-d');
                $night = rand(2, 8);
                $end_date = $reservation_date->modify('+' . $night . ' day')->format('Y-m-d');

                $reservation = ReservationService::createReservation($start_date, $end_date, $room, $complements);
                $reservation->adults = rand(1, 3);
                $reservation->kids = rand(0, 2);
                $reservation->save();
            }
        }
    }
}
