<?php

namespace App\Services;

use App\Models\Offer;

class OfferService
{
    static function  findOffer($nights)
    {
        return Offer::where('nights', '<=', $nights)->orderBy('nights', 'desc')->first();
    }
    static function  calculateOffer($price, $offer, $nights)
    {
        $offer_percent = 1 - ($offer->percent / 100);
        $total = ($price * $offer_percent) * $nights;
        return round($total, 2);
    }
}
