<?php

namespace App\Livewire\Bed;

use App\Models\bed;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BedList extends Component
{
    public $label = 'Cama';
    public $labelPlural = 'Camas';

    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;

    public function delete($id)
    {
        $bed = Bed::findOrFail($id);
        //Storage::delete([$bed->icon]);
        $bed->delete();
        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderBedList');

        $this->dispatch('toast', title: 'Registro Eliminado');
    }

    #[On('renderBedList')]
    public function render()
    {
        $list = Bed::where('name', 'like', '%' . $this->search . '%')
            ->withCount('rooms')
            ->orderBy('id', 'desc')
            ->paginate(24);

        return view('livewire.bed.bed-list', compact('list'));
    }
}
