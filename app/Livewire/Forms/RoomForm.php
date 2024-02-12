<?php

namespace App\Livewire\Forms;

use App\Models\Room;
use App\Traits\TraitUploadImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomForm extends Form
{
    use TraitUploadImage;

    public ?Room $room = null;
    public $name;
    public $slug;
    public $entry;
    public $description;
    public $quantity;
    public $price;
    public $active;
    public $adults;
    public $kids;
    public $img;
    public $thumb;
    public $home;
    public $about;
    public $amenities = [];
    public $beds = [];

    protected  $rules = [
        'name' => ['required', 'string', 'min:1', 'max:255'],
        'slug' => ['required', 'string', 'min:1', 'max:255'],
        'entry' => ['required', 'string', 'min:1', 'max:255'],
        'description' => ['required', 'string', 'min:1'],
        'quantity' => ['required', 'integer', 'min:0', 'max:65535'],
        'price' => ['required', 'numeric', 'min:0'],
        'active' => ['required', 'boolean'],
        'adults' => ['required', 'integer', 'min:0', 'max:255'],
        'kids' => ['nullable', 'integer', 'min:0', 'max:255'],
        'img' => ['required', 'image', 'mimes:jpg,png', 'max:2024',],
        'thumb' => ['required', 'image', 'mimes:jpg,png', 'max:2024',],
        'home' => ['required', 'boolean'],
        'about' => ['required', 'boolean'],
        'amenities' => ['required', 'array'],
        'amenities.*' => ['required'],
        'beds' => ['required', 'array'],
        'beds.*' => ['required'],
    ];
    public function validationAttributes()
    {
        return [

            'name' => 'Nombre',
            'slug' => 'Url',
            'entry' => 'Descripcion pequeña',
            'description' => 'Descripcion amplia',
            'quantity' => 'Cantidad',
            'price' => 'Precio',
            'active' => 'Activo',
            'adults' => 'Adultos',
            'kids' => 'Niños',
            'img' => 'Imagen Amplia',
            'thumb' => 'Imagen pequeña',
            'home' => 'Aparece en el Inicio',
            'about' => "Aparecen en 'Acerca de'",
            'amenities' => 'Comodidades',
            'beds' => 'Camas',

        ];
    }

    public function setRoom(Room $room)
    {
        $this->room = $room;
        $this->name = $room->name;
        $this->slug = $room->slug;
        $this->entry = $room->entry;
        $this->description = $room->description;
        $this->quantity = $room->quantity;
        $this->price = $room->price;
        $this->active = $room->active;
        $this->adults = $room->adults;
        $this->kids = $room->kids;
        $this->home = $room->home;
        $this->about = $room->about;
        $this->amenities = $room->amenities->pluck('id')->toArray();
        $this->beds = $room->beds->pluck('pivot.quantity', 'id')->toArray();

        // $this->img = $room->img;
        // $this->thumb = $room->thumb;
    }

    public function store()
    {
        if (!$this->room) {
            //create
            $this->room = new Room();
        } else {
            //update
            $this->rules['img'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
            $this->rules['thumb'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
        }

        $this->validate();

        $this->room->fill($this->except(['thumb', 'img', 'amenities', 'beds', 'room', 'rules']));

        if ($this->thumb) {

            if ($this->room->thumb) {
                // Storage::delete($this->room->thumb);
            }
            $this->room->thumb = $this->upload_image($this->room->name, 'rooms/thumb', $this->thumb);
        }

        if ($this->img) {
            if ($this->room->img) {
                // Storage::delete($this->room->img);
            }
            $this->room->img = $this->upload_image($this->room->name, 'room', $this->img);
        }

        $this->room->save();

        $this->room->amenities()->sync($this->amenities);

        $bedSelected = [];

        foreach (array_filter($this->beds) as $id => $quantity) {
            $bedSelected[$id] = ['quantity' => $quantity];
        }

        $this->room->beds()->sync($bedSelected);
    }
}
