<?php

namespace App\Livewire\Amenity;

use App\Models\Amenity;
use App\Traits\TraitUploadImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AmenityCreate extends Component
{
    use TraitUploadImage, WithFileUploads;
    public $label = 'Comodidad';
    public $labelPlural = 'Comodidades';
    public $nameRouteDataList = 'dashboard.amenities.index';
    public Amenity $amenity;
    public $name;
    public $entry;
    public $img;

    public $isEdit = false;
    public $imgSaved;
    protected  $rules = [
        'name' => ['required', 'string', 'min:1', 'max:255'],
        'entry' => ['required', 'string', 'min:1', 'max:255'],
        'img' => ['required', 'image', 'mimes:jpg,png', 'max:2024',],
    ];

    public function validationAttributes()
    {
        return [
            'name' => 'Nombre',
            'entry' => 'Descripcion pequeña',
            'img' => 'Icono',
        ];
    }

    public function mount($id = null)
    {
        $this->isEdit = boolval($id);
        if ($id) {
            $this->amenity = Amenity::findOrFail($id);
            $this->name = $this->amenity->name;
            $this->entry = $this->amenity->entry;
            $this->imgSaved = $this->amenity->icon;
        } else {
            $this->amenity = new Amenity();
            // $this->name = $this->amenity->name;
            // $this->entry = $this->amenity->entry;
            // $this->icon = $this->amenity->icon;
        }
    }
    public function store()
    {

        if ($this->isEdit) {
            $this->rules['img'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
        }
        $this->validate();

        $this->amenity->fill($this->only(['name', 'entry']));

        if ($this->img) {

            if ($this->amenity->icon) {
                // Storage::delete($this->amenity->icon);
            }
            $this->amenity->icon = $this->upload_image($this->amenity->name, 'amenities', $this->img);
        }
        $this->amenity->save();

        return redirect()->route($this->nameRouteDataList)->with('success', 'Registro Guardados');
    }

    public function render()
    {
        return view('livewire.amenity.amenity-create');
    }
}
