<?php

namespace App\Http\Controllers;

use App\Http\Resources\BedResource;
use App\Http\Resources\RoomResource;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\User;
use App\Services\OfferService;
use App\Services\ReservationService;
use App\Services\RoomService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function searchReservation(Request $request)
    {
        //dd($request->all());
        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);
        $nights = $startDate->diffInDays($endDate);

        // dd($startDate, $endDate);
        $rooms = RoomService::searchAvailableRoom($startDate, $endDate, $request->adults, $request->kids);
        $rooms->load('beds', 'amenities');
        $offer = OfferService::findOffer($nights);
        $rooms = $rooms->map(function ($room) use ($offer, $nights) {

            $room->charge = ReservationService::totalCalculation($room->price, $nights, $offer);
            return $room;
        });


        return Inertia::render('Reservation/Reservation', [
            'rooms' => RoomResource::collection($rooms),
            'nights' => $nights,
            'filters' => [
                'startDate' => $startDate->format('Y-m-d'),
                'endDate' => $endDate->format('Y-m-d'),
                'adults' => $request->adults,
                'kids' => $request->kids
            ]
        ]);
    }
}
