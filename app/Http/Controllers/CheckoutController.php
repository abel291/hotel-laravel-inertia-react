<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCheckoutRequest;
use App\Models\Reservation;
use App\Models\User;
use App\Services\OfferService;
use App\Services\ReservationService;
use App\Services\RoomService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{

    public function checkout()
    {

        $reservation = session('reservation');
        $room = session('room');
        $charge = session('charge');

        return Inertia::render('Checkout/Checkout', [
            'reservation' => $reservation,
            'room' => $room,
            'charge' => $charge,
            'user' => User::factory()->make(),
            'note' => fake()->text(200),
        ]);
    }

    public function checkoutSession(Request $request)
    {
        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);
        $nights = $startDate->diffInDays($endDate);

        $rooms = RoomService::searchAvailableRoom($startDate, $endDate, $request->adults, $request->kids);

        $room = $rooms->firstWhere('id', $request->roomId);

        $reservation = [
            'code' => fake()->bothify('?#?#?#?#'),
            'startDate' => $startDate->format('Y-m-d'),
            'endDate' => $endDate->format('Y-m-d'),
            'nights' => $nights,
            'adults' => $request->adults,
            'kids' => $request->kids,
        ];

        $offer = OfferService::findOffer($nights);
        $charge = ReservationService::totalCalculation($room->price, $nights, $offer);

        session([
            'reservation' => $reservation,
            'room' => $room->only('name', 'slug', 'price', 'thumb', 'adults', 'kids'),
            'charge' => $charge,
        ]);

        return to_route('checkout');
    }
    public function payment(UserCheckoutRequest $request)
    {
        sleep(10);
        dd($request->all());
        $reservation = session('reservation');
        $room = session('room');
        $charge = session('charge');
    }
}
