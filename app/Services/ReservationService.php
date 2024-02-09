<?php // Code within app\Helpers\Helper.php

namespace App\Services;

use App\Models\Complement;
use App\Models\Discount;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class ReservationService
{

    public static function createReservation($start_date, $end_date, $room)
    {

        $nights = $start_date->diffInDays($end_date);
        $offer = OfferService::findOffer($nights);
        $charge = ReservationService::totalCalculation($room->price, $nights, $offer);
        // dd($charge);
        $reservation = new Reservation([
            'start_date' => $start_date->format('Y-m-d'),
            'end_date' => $end_date->format('Y-m-d'),
            'nights' => $nights,
            'code' => fake()->bothify('########'),
            'price' => $charge['pricePerNight'],
            'nights' => $nights,
            'sub_total' => $charge['subTotal'],
            'tax_percent' => $charge['taxPercent'],
            'tax_amount' => $charge['taxAmount'],
            'total' => $charge['total'],
            'offer' => $charge['offer'],
            'room_id' => $room->id,
        ]);

        return $reservation;
    }
    public static function calculatePriceTotalNights(float $price, int $nights)
    {
        return round($price * $nights, 2);
    }
    public static function totalCalculation(float $pricePerNight, int $nights, Offer $offer = null): array
    {

        $subTotal = self::calculatePriceTotalNights($pricePerNight, $nights);
        if ($offer) {
            $offer = OfferService::calculateOffer($offer, $subTotal);
            $subTotalOffer = $offer['priceTotalOffer'];
        } else {
            $subTotalOffer = $subTotal;
        }

        // if ($complements) {

        //     $complements = $complements->map(function (Complement $complement) use ($night) {

        //         if ($complement->type_price == 'night') {

        //             $complement->total = $complement->price * $night;
        //         } elseif ($complement->type_price == 'reservation') {

        //             $complement->total = $complement->price;
        //         }

        //         return $complement->only('name', 'price', 'type_price', 'total');
        //     });

        //     $subTotal_complements = $subTotal + $complements->sum('total');
        // } else {
        //     $subTotal_complements = $subTotal;
        // }

        // if ($code_dicount) {

        //     $discount = Discount::where('code', $code_dicount)->withCount('reservations')->first();

        //     $discount->amount = round($subTotal_complements * ($discount->percent / 100), 2);

        //     $discount = $discount->only('code', 'amount', 'percent');

        //     $total = $subTotal_complements - $discount->amount;
        // } else {
        //     $discount = null;
        //     $total = $subTotal_complements;
        // }

        $taxPercent = 10;

        $taxAmount = $subTotalOffer * ($taxPercent / 100);

        $total = $subTotalOffer + $taxAmount;

        return [
            'pricePerNight' => $pricePerNight,
            'subTotal' => $subTotal,
            'subTotalOffer' => $subTotalOffer,
            'taxPercent' => $taxPercent,
            'taxAmount' => $taxAmount,
            'total' => $total,
            'offer' => $offer,
            'nights' => $nights,
        ];
    }
    public static function generateCode($reservation)
    {
        return rand(1, 9) . $reservation->start_date->format('md') . $reservation->user_id;
    }
}
