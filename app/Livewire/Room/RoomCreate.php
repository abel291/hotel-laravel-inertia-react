<?php

namespace App\Livewire\Room;

use App\Livewire\Forms\RoomForm;
use App\Models\Amenity;
use App\Models\Bed;
use App\Models\Room;
use App\Traits\TraitUploadImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class RoomCreate extends Component
{
    use TraitUploadImage, WithFileUploads;
    public $label = 'Habitacion';
    public $labelPlural = 'Habitaciones';

    public RoomForm $form;

    public $amenitiyList;
    public $amenitiesSelected = [];

    public $bedList;
    public $bedsSelected = [];

    public $isEdit = false;

    public $thumbSaved;
    public $imgSaved;

    public function mount($id = null)
    {
        $this->isEdit = boolval($id);
        $this->amenitiyList = Amenity::get();
        $this->bedList = Bed::get();

        if ($id) {
            $room = Room::with('beds', 'amenities')->findOrFail($id);
            $this->form->setRoom($room);
            $this->thumbSaved = $room->thumb;
            $this->imgSaved = $room->img;
        } else {
            $room = Room::factory()->make();
            $this->form->name = $room->name;
            $this->form->slug = $room->slug;
            $this->form->entry = $room->entry;
            $this->form->description = $room->description;
            $this->form->quantity = $room->quantity;
            $this->form->price = $room->price;
            $this->form->active = $room->active;
            $this->form->adults = $room->adults;
            $this->form->kids = $room->kids;
            $this->form->home = $room->home;
            $this->form->about = $room->about;
            // $room = Room::factory()->make();
            // $this->form->setRoom($room);
        }
    }
    public function save()
    {

        $this->form->store();

        return redirect()->route('dashboard.rooms.index')->with('success', 'Registro Guardados');
    }

    public function update()
    {

        $this->form->store();

        return redirect()->route('dashboard.rooms.index')->with('success', 'Registro Guardados');
    }
    public function render()
    {
        return view('livewire.room.room-create');
    }
}
