<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use App\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TagList extends Component
{
    public  $label = 'Tag';
    public $labelPlural = 'Tags';
    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;

    #[On('renderTagList')]
    public function render()
    {
        $list = Tag::where('name', 'like', '%' . $this->search . '%')
            ->paginate(20);

        return view('livewire.tag.tag-list', compact('list'));
    }
}
