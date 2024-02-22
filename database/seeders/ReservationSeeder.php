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
        $users = User::select('id', 'name', 'email', 'phone', 'country', 'city')->get();
        for ($i = 0; $i < 100; $i++) {

            $rooms_selected = $rooms->random(6);

            // $discount = $discounts->random();
            foreach ($rooms_selected as $room) {
                $user = $users->random();
                $reservation_date = Carbon::parse(fake()->dateTimeInInterval('-2 month', '+2 month'));
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
                    'user' => $user->only(['name', 'email', 'phone', 'country', 'city'])
                ];
                $reservation->state = fake()->randomElement(ReservationStatus::cases());
                $reservation->adults = rand(1, 3);
                $reservation->kids = rand(0, 1);
                $reservation->user_id = $user->id;

                $reservation->save();
            }
        }
    }
}
