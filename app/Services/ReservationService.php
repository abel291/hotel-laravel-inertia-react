<?php // Code within app\Helpers\Helper.php

namespace App\Services;

use App\Models\Complement;
use App\Models\Discount;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ReservationService
{
    public static function createReservation($start_date, $end_date, $room, $complements = null, $discount = null)
    {
        $start_date = Carbon::createFromFormat('Y-m-d', $start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $end_date);
        $night = $start_date->diffInDays($end_date);

        $reservation = new Reservation([
            'code' => fake()->bothify('?#?#?#?#'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'night' => $night,
            'room_id' => $room->id,
            'room_data' => $room->only('name', 'price', 'img', 'beds'),
        ]);

        $calculated_price = ReservationService::totalCalculation(
            price: $room->price,
            night: $reservation->night,
            complements: $complements,
        );

        $reservation->sub_total = $calculated_price['sub_total'];
        $reservation->total = $calculated_price['total'];
        $reservation->complements_data = $calculated_price['complements_data'];
        $reservation->discount_data = $calculated_price['discount_data'];


        return $reservation;
    }
    public static function totalCalculation(float $price, int $night, Collection $complements = null, string $code_dicount = null)
    {
        $sub_total_complements = 0;
        $sub_total_complements = 0;
        $total = 0;

        $sub_total = $price * $night;

        if ($complements) {

            $complements = $complements->map(function (Complement $complement) use ($night) {

                if ($complement->type_price == 'night') {

                    $complement->total = $complement->price * $night;
                } elseif ($complement->type_price == 'reservation') {

                    $complement->total = $complement->price;
                }

                return $complement->only('name', 'price', 'type_price', 'total');
            });

            $sub_total_complements = $sub_total + $complements->sum('total');
        } else {
            $sub_total_complements = $sub_total;
        }

        if ($code_dicount) {

            $discount = Discount::where('code', $code_dicount)->withCount('reservations')->first();

            $discount->amount = round($sub_total_complements * ($discount->percent / 100), 2);

            $discount = $discount->only('code', 'amount', 'percent');

            $total = $sub_total_complements - $discount->amount;
        } else {
            $discount = null;
            $total = $sub_total_complements;
        }



        return [
            'sub_total' => $sub_total,
            'complements_data' => $complements,
            'discount_data' => $discount,
            'total' => $total,
        ];
    }
    public static function generateCode($reservation)
    {
        return rand(1, 9) . $reservation->start_date->format('md') . $reservation->user_id;
    }
}
