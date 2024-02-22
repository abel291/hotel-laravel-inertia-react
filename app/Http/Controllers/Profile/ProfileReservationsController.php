<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\InvoiceService;
use Barryvdh\DomPDF\Facade\Pdf;
use Inertia\Inertia;
use Inertia\Response;

class ProfileReservationsController extends Controller
{
    public function reservations(): Response
    {

        $reservations = auth()->user()->reservations()->orderBy('id', 'desc')->paginate(10);

        return Inertia::render('Profile/ReservationsList', [
            'reservations' => $reservations,
        ]);
    }

    public function reservationDetails($code)
    {
        $reservation = auth()->user()->reservations()->where('code', $code)->firstOrFail();

        return Inertia::render('Profile/ReservationDetails', [
            'reservation' => $reservation,
        ]);
    }

    public function invoicePdf($code)
    {
        $reservation = auth()->user()->reservations()->where('code', $code)->firstOrFail();

        $invoice = InvoiceService::generateInvoice($reservation);

        //return view('pdf.invoice', compact('order'));
        return $invoice->stream();
    }
}
