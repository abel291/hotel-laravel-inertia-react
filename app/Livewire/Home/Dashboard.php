<?php

namespace App\Livewire\Home;

use App\Enums\ReservationStatus;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $filterTime = [
        'hace 7 dias' => 7,
        '1 mes' => 30,
        '2 meses' => 60,
        '6 meses' => 120,
        '12 meses' => 360,
        // 'Todo' => 30,
    ];
    public $activeTab;
    public function mount()
    {
        $this->activeTab = array_values($this->filterTime)[0];
        // dd($this->activeTab);
    }
    public function render()
    {
        // dd($this->activeTab);

        $nights = $this->activeTab;
        $lastDays = now()->subDays($nights);
        // dd($lastDays);
        $reservations = Reservation::with('room:id,name,slug,price,thumb')
            ->where('start_date', '>=', $lastDays)
            ->orderBy('id', 'desc')
            ->get();

        $reservationSuccessful = $reservations->where('state', ReservationStatus::SUCCESSFUL);

        $totalIncome = $reservationSuccessful->sum('total');

        $totalRoomsReservation = (int) $reservations->sum('quantity');

        if ($totalRoomsReservation) {
            $averageNights =  round($reservations->sum('nights') / $totalRoomsReservation);
        } else {
            $averageNights =  0;
        }

        $reservationForRoom = $reservations->groupBy('room.name')->map(function ($reservations) {
            return $reservations->sum('quantity');
        });
        $popularRoom = $reservations->groupBy('room_id')->sortByDesc(function ($item) {
            return $item->count();
        })->first()?->first()->room;

        $reservationRecent = $reservations->take(6);

        // $this->emit('updateChart');

        $usersRegister = User::select('id', 'created_at')
            ->where('created_at', '>=', $lastDays)
            ->orderBy('created_at')
            ->get();

        $registeredUserMonth = $usersRegister->groupBy(function ($user, $key) {
            return ucfirst($user->created_at->isoFormat('MMMM'));
        })->map(function ($item) {
            return $item->count();
        });

        $this->dispatch('update-chart', [
            'chart1' => [
                'labels' => $reservationForRoom->keys()->toArray(),
                'datasets' =>   $reservationForRoom->values()->toArray(),
            ],
            'chart2' => [
                'labels' => $registeredUserMonth->keys()->toArray(),
                'datasets' =>   $registeredUserMonth->values()->toArray(),
            ],

        ]);

        return view('livewire.home.dashboard', [
            'totalIncome' => $totalIncome,
            'totalRoomsReservation' => $totalRoomsReservation,
            'averageNights' => $averageNights,
            'reservationForRoom' => $reservationForRoom,
            'reservationRecent' => $reservationRecent,
            'popularRoom' => $popularRoom,
            'registeredUserCount' => $registeredUserMonth->sum(),
        ]);
    }
}
