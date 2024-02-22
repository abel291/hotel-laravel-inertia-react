<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;

class TagCreate extends Component
{
    public  $label;
    public $labelPlural;
    public $openModal = false;

    public $open_modal_confirmation_delete;

    public $tag;

    public $name;
    public $slug;
    public $active;

    public function rules()
    {
        return [
            'slug' => 'required|string|max:250',
            'name' => 'required|string|max:250',
            'active' => 'required|boolean',
        ];
    }
    public function validationAttributes()
    {
        return [
            'slug' => 'Url',
            'name' => 'Nombre',
            'actvie' => 'Actvio',
        ];
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['name', 'slug', 'active']);
        $this->tag = null;
    }

    public function edit(Tag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->slug = $tag->slug;
        $this->active = $tag->active;
        $this->resetValidation();
    }

    public function store()
    {

        $this->validate();

        // if ($this->id) {
        //     $tag = Tag::find($this->id);
        // } else {
        //     $tag = new Tag();
        // }

        $this->tag->name = $this->name;
        $this->tag->slug = $this->slug;
        $this->tag->active = $this->active;
        $this->tag->save();

        $this->openModal = false;
        $this->dispatch('renderTagList');
        $this->dispatch('toast', title: 'Registro Editado');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        $this->open_modal_confirmation_delete = false;
        $this->reset('tag');
        $this->dispatch('renderTagList');
        $this->dispatch('toast', title: 'Registro Eliminado');
    }


    public function render()
    {
        return view('livewire.tag.tag-create');
    }
}
