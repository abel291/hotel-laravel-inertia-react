<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public  $label;
    public $labelPlural;
    public $openModal = false;

    public $id;

    public $name;
    public $slug;
    public $active;

    public function rules()
    {
        return [
            'slug' => 'required|string|max:250',
            'name' => 'required|string|max:250',
            'active' => 'required|string|max:250',
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
        $this->id = null;
    }
    public function edit(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->active = $category->active;
        $this->resetValidation();
    }

    public function store()
    {
        if ($this->id) {
            Category::find($this->id)->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'active' => $this->active,
            ]);
        } else {
            Category::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'active' => $this->active,
            ]);
        }
        $this->openModal = false;
        $this->dispatch('renderCategoryList');
        $this->dispatch('toast', title: 'Registro Editado');
    }



    public function render()
    {
        return view('livewire.category.category-create');
    }
}
