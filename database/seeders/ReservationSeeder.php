<?php

namespace Database\Seeders;

use App\Enums\ReservationStatus;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use App\Services\ReservationService;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Reservation::truncate();
        $rooms = Room::with('beds')->get();
        for ($i = 0; $i < 30; $i++) {

            $rooms_selected = $rooms->random(2);

            // $discount = $discounts->random();
            foreach ($rooms_selected as $room) {

                $reservation_date = Carbon::now()->addDays(rand(0, 50));
                $start_date = Carbon::parse($reservation_date);
                $nights = rand(2, 8);
                $end_date = $reservation_date->addDays($nights);

                $reservation = ReservationService::createReservation($start_date, $end_date, $room);
                $reservation->data = [
                    'room' =>  [
                        ...$room->only('id', 'name', 'slug', 'price', 'thumb', 'adults', 'kids'),
                        'beds' => $room->beds->map(function ($bed) {
                            return [
                                'name' => $bed->name,
                                'quantity' => $bed->pivot->quantity,
                                'icon' => $bed->icon
                            ];
                        })
                    ],
                    'user' => User::factory()->make()->only(['name', 'email', 'phone', 'country', 'city'])
                ];
                $reservation->state = fake()->randomElement(ReservationStatus::cases());
                $reservation->adults = rand(1, 3);
                $reservation->kids = rand(0, 1);

                $reservation->save();
            }
        }
    }
}
