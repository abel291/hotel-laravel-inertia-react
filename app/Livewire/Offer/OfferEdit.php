<?php

namespace App\Livewire\Offer;

use App\Livewire\Forms\OfferForm;
use App\Models\Offer;
use Livewire\Component;

class OfferEdit extends Component
{
    public  $label;
    public $labelPlural;
    public $openModal = false;
    public Offer $offer;

    public $percent;
    public $nights;

    public function rules()
    {
        return [
            'nights' => 'required|min:0',
            'percent' => 'required|min:0',
        ];
    }
    public function validationAttributes()
    {
        return [
            'nights' => 'Noches',
            'percent' => 'porcentaje',
        ];
    }

    public function edit(Offer $offer)
    {

        $this->offer = $offer;
        $this->nights = $this->offer->nights;
        $this->percent = $this->offer->percent;

        $this->resetValidation();
    }
    public function update()
    {
        $this->validate();

        $this->offer->update([
            'nights' => $this->nights,
            'percent' => $this->percent
        ]);

        $this->openModal = false;
        $this->dispatch('renderOfferList');
        $this->dispatch('toast', title: 'Registro Editado');
    }

    public function render()
    {
        return view('livewire.offer.offer-edit');
    }
}
