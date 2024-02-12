<?php

namespace App\Livewire\Amenity;

use App\Models\Amenity;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AmenityList extends Component
{
    public $label = 'Comodidad';
    public $labelPlural = 'Comodidades';

    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;

    public function delete($id)
    {
        $amenity = Amenity::findOrFail($id);
        //Storage::delete([$amenity->icon]);
        $amenity->delete();
        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderAmenityList');

        $this->dispatch('toast', title: 'Registro Eliminado');
    }

    #[On('renderAmenityList')]
    public function render()
    {
        $list = Amenity::where('name', 'like', '%' . $this->search . '%')
            ->withCount('rooms')
            ->orderBy('id', 'desc')
            ->paginate(24);

        return view('livewire.amenity.amenity-list', compact('list'));
    }
}
