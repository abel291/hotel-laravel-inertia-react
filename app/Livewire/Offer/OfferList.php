<?php

namespace App\Livewire\Offer;

use App\Models\Offer;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class OfferList extends Component
{
    public  $label = 'Oferta';
    public $labelPlural = 'Ofertas';
    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;

    #[On('renderOfferList')]
    public function render()
    {
        $list = Offer::orderBy('nights')->paginate(20);

        return view('livewire.offer.offer-list', compact('list'));
    }
}
