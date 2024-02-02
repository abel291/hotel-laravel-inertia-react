<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCheckoutRequest;
use App\Mail\OrderShipped;
use App\Models\Reservation;
use App\Models\User;
use App\Services\OfferService;
use App\Services\ReservationService;
use App\Services\RoomService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $nights = $start_date->diffInDays($end_date);

        $rooms = RoomService::searchAvailableRoom($start_date, $end_date, $request->adults, $request->kids);
        $room = $rooms->firstWhere('id', $request->roomId);
        $room->load('beds');

        $reservation = [
            'start_date' => $start_date->format('Y-m-d'),
            'end_date' => $end_date->format('Y-m-d'),
            'nights' => $nights,
            'adults' =>   $request->adults,
            'kids' =>  $request->kids,
        ];

        $offer = OfferService::findOffer($nights);

        $charge = ReservationService::totalCalculation($room->price, $nights, $offer);

        session([
            'reservation' => $reservation,
            'room' => $room->only('id', 'name', 'slug', 'price', 'thumb', 'adults', 'kids', 'beds'),
            'charge' => $charge,
        ]);

        return to_route('checkout');
    }
}
