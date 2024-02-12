<?php

namespace App\Livewire\Bed;

use App\Models\Bed;
use App\Traits\TraitUploadImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BedCreate extends Component
{
    use TraitUploadImage, WithFileUploads;
    public $label = 'Cama';
    public $labelPlural = 'Camas';
    public $nameRouteDataList = 'dashboard.beds.index';
    public Bed $bed;
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
            $this->bed = Bed::findOrFail($id);
            $this->name = $this->bed->name;
            $this->entry = $this->bed->entry;
            $this->imgSaved = $this->bed->icon;
        } else {
            $this->bed = new Bed();
            // $this->name = $this->bed->name;
            // $this->entry = $this->bed->entry;
            // $this->icon = $this->bed->icon;
        }
    }
    public function store()
    {

        if ($this->isEdit) {
            $this->rules['img'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
        }
        $this->validate();

        $this->bed->fill($this->only(['name', 'entry']));

        if ($this->img) {

            if ($this->bed->icon) {
                // Storage::delete($this->bed->icon);
            }
            $this->bed->icon = $this->upload_image($this->bed->name, 'amenities', $this->img);
        }
        $this->bed->save();

        return redirect()->route($this->nameRouteDataList)->with('success', 'Registro Guardados');
    }

    public function render()
    {
        return view('livewire.bed.bed-create');
    }
}
