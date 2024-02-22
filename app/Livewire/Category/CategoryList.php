<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    public  $label = 'Categoria';
    public $labelPlural = 'Categorias';
    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;
    public function delete(Category $category)
    {
        $category->delete();
        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderCategoryList');
        $this->dispatch('toast', title: 'Registro Eliminado');
    }

    #[On('renderCategoryList')]
    public function render()
    {
        $list = Category::where('name', 'like', '%' . $this->search . '%')
            ->paginate(20);

        return view('livewire.category.category-list', compact('list'));
    }
}
