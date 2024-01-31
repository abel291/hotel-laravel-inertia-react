<?php

namespace App\Services;

use App\Models\Offer;

class OfferService
{
    public static function  findOffer($nights)
    {
        return  Offer::where('nights', '<=', $nights)->orderBy('nights', 'desc')->first();
    }
    // public static function  calculateOffer($price, $offer = null, $nights)
    // {
    //     $offer_percent = 1;
    //     if ($offer) {
    //         $offer_percent = 1 - ($offer->percent / 100);
    //     }
    //     $total = ($price * $offer_percent) * $nights;
    //     return round($total, 2);
    // }

    public static function  calculateOffer(Offer $offer, float $priceTotalNights): array
    {

        $offerAmount = $priceTotalNights * ($offer->percent / 100);

        $priceTotalOffer = $priceTotalNights - $offerAmount;

        return [
            ...$offer->toArray(),
            'offerAmount' => $offerAmount,
            'priceTotalOffer' => $priceTotalOffer,
        ];
    }
    public static function  calculateOfferAmount($amount, $offer)
    {
        return $amount * ($offer->percent / 100);
    }
    public static function  addOfferRoom($room, $nights, $offer)
    {
        if ($offer) {
            $room->offer = [
                'percent' => $offer->percent,
                'night' => $offer->night,
                'price' => OfferService::calculateOffer($room->price, $offer, $nights)
            ];
        }
    }
}
