<?php

namespace App\Livewire\Image;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Room;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ImageList extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Imagen';

    public $labelPlural = 'Imagenes';

    public $open_modal_confirmation_delete = false;

    protected $queryString = ['sortBy', 'sortDirection', 'search'];

    public $modelData;

    public $modelName;

    public $modelId;

    public $listModel = [
        'room' => Room::class,
        'blog' => Blog::class,
    ];

    public function mount($modelName, $modelId)
    {
        $this->modelData = $this->listModel[$modelName]::find($modelId);
        $this->modelName = $modelName;
        $this->modelId = $modelId;
    }
    public function delete($imageId)
    {
        $post = Image::findOrFail($imageId);
        //Storage::delete([$post->icon]);
        $post->delete();
        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderImageList');

        $this->dispatch('toast', title: 'Registro Eliminado');
    }





    #[On('renderImageList')]
    public function render()
    {

        $list = $this->modelData->images()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.image.image-list', compact('list'));
    }
}
