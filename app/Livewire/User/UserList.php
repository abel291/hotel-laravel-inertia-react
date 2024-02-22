<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    public  $label = 'Usuario';
    public $labelPlural = 'Usuarios';
    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;
    public function delete(User $user)
    {


        if ($user->id == auth()->user()->id) {
            $this->dispatch('toast', title: 'No puedes borrar tu mismo ususario.');
            session()->flash('success', '');
        } else {
            // $user->delete();
            $this->dispatch('renderUserList');
            $this->dispatch('toast', title: 'Registro Eliminado');
        }
        $this->open_modal_confirmation_delete = false;
    }

    #[On('renderUserList')]
    public function render()
    {
        $list = User::where('name', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.user.user-list', compact('list'));
    }
}
