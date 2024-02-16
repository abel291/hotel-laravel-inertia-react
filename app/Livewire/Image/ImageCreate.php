<?php

namespace App\Livewire\Image;

use App\Models\Blog;
use App\Models\Image;
use App\Models\Room;
use App\Traits\TraitUploadImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\AssignOp\Mod;

class ImageCreate extends Component
{
    use TraitUploadImage, WithFileUploads;
    public $openModal = false;
    public $label;
    public $labelPlural;

    public $modelData;

    public Image $image;
    public $img;
    public $alt;
    public $title;
    public $order;
    public $isEdit;
    public $imgSaved;

    public $listModel = [
        'room' => Room::class,
        'blog' => Blog::class,
    ];

    protected  $rules = [
        'img' => ['required', 'image', 'mimes:jpg,png', 'max:2024'],
        'alt' => ['nullable', 'string', 'min:1', 'max:255'],
        'title' => ['nullable', 'string', 'min:1', 'max:255'],
        'order' => ['nullable', 'string', 'min:1', 'max:255'],
    ];

    public function validationAttributes()
    {
        return [
            'img' => 'Imagen',
        ];
    }

    public function mount($modelData, $imageId = null)
    {
        $this->modelData = $modelData;
        $this->isEdit = boolval($imageId);
        $this->image = new Image();
    }
    public function create()
    {
        $this->image = new Image();
        $this->resetValidation();
    }

    public function edit(int $imageId)
    {

        $this->image = Image::findOrFail($imageId);
        $this->imgSaved = $this->image->img;
        $this->alt = $this->image->alt;
        $this->title = $this->image->title;
        $this->order = $this->image->order;
        $this->resetValidation();
    }

    public function store()
    {
        if ($this->isEdit) {
            $this->rules['img'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
        }
        $this->validate();
        $image = $this->image;
        $image->title = $this->title;
        $image->alt = $this->alt;
        $image->order = $this->order;
        // $image->model_id = $this->modelId;
        // $image->model_type = class_basename($this->modelData);
        if ($this->img) {

            if ($image->img) {
                // Storage::delete($this->bed->icon);
            }
            $image->img = $this->upload_image('image', 'images', $this->img);
        }

        // $image->save();
        $image->model()->associate($this->modelData)->save();

        $this->resetValidation();

        $this->openModal = false;
        $this->dispatch('renderImageList');
        $this->dispatch('toast', title: 'Registro Guardado');

        // return redirect()->route('dashboard.images.index', [$this->modelName, $this->modelId])->with('success', 'Registro Guardados');
    }


    public function render()
    {
        return view('livewire.image.image-create');
    }
}
