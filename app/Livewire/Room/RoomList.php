<?php

namespace App\Livewire\Room;

use App\Models\Room;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class RoomList extends Component
{
    public $label = 'Habitacion';
    public $labelPlural = 'Habitaciones';
    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;


    public function delete($id)
    {
        $room = Room::find($id);
        // Storage::delete([$room->img, $room->thumb]);
        $room->delete();


        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderListRoom');
        $this->dispatch('toast', title: 'Registro Eliminado');
    }

    #[On('renderListRoom')]
    public function render()
    {
        $list = Room::where('name', 'like', '%' . $this->search . '%')
            ->with('beds', 'amenities')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.room.room-list', compact('list'));
    }
}
