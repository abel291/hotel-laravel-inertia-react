<?php

namespace App\Livewire\Reservation;

use App\Models\Reservation;
use Livewire\Component;

class ReservationShow extends Component
{
    public  $label = 'Reservacion';
    public $labelPlural = 'Reservaciones';
    public Reservation $reservation;

    public function mount(Reservation $reservation)
    {

        $this->reservation = $reservation;
    }
    public function render()
    {
        return view('livewire.reservation.reservation-show');
    }
}
