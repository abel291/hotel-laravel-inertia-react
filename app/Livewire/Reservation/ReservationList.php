<?php

namespace App\Livewire\Reservation;

use App\Models\Reservation;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ReservationList extends Component
{
    public  $label = 'Reservacion';
    public $labelPlural = 'Reservaciones';

    use WithSorting;
    use WithPagination;

    #[On('renderReservationList')]
    public function render()
    {
        $list = Reservation::with('room')
            ->where('code', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')->paginate(20);
        // dd($list->first()->data->user->name);
        return view('livewire.reservation.reservation-list', compact('list'));
    }
}
