<?php

namespace App\Livewire\Post;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Traits\TraitUploadImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use TraitUploadImage, WithFileUploads;
    public $label = 'Post';
    public $labelPlural = 'Posts';
    public Blog $post;

    public $isEdit = false;

    public $title;
    public $slug;
    public $entry;
    public $active;
    public $description;
    public $seo_title;
    public $seo_desc;
    public $home;
    public $img;
    public $thumb;
    public $category_id;
    public $selectedTags = [];

    public $thumbSaved;
    public $imgSaved;

    protected  $rules = [
        'title' => ['required', 'string', 'min:1', 'max:255'],
        'slug' => ['required', 'string', 'min:1', 'max:255'],
        'entry' => ['required', 'string', 'min:1', 'max:255'],
        'seo_title' => ['required', 'string', 'min:1', 'max:255'],
        'seo_desc' => ['required', 'string', 'min:1', 'max:255'],
        'description' => ['required', 'string', 'min:1'],
        'active' => ['required', 'boolean'],
        'img' => ['required', 'image', 'mimes:jpg,png', 'max:2024',],
        'thumb' => ['required', 'image', 'mimes:jpg,png', 'max:2024',],
        'home' => ['required', 'boolean'],
        'category_id' => ['required', 'exists:categories,id'],
        'selectedTags' => ['required'],
    ];
    public function validationAttributes()
    {
        return [
            'title' => 'Nombre',
            'slug' => 'Url',
            'entry' => 'Descripcion pequeña',
            'description' => 'Descripcion amplia',
            'active' => 'Activo',
            'img' => 'Imagen Amplia',
            'thumb' => 'Imagen pequeña',
            'home' => 'Aparece en el Inicio',
        ];
    }

    public function mount($id = null)
    {
        $this->isEdit = boolval($id);

        if ($id) {
            $this->post = Blog::with('tags')->findOrFail($id);

            $this->selectedTags = $this->post->tags->pluck('id')->toArray();

            $this->thumbSaved = $this->post->thumb;
            $this->imgSaved = $this->post->img;
        } else {
            $this->post = Blog::factory()->make();
        }

        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->entry = $this->post->entry;
        $this->active = $this->post->active;
        $this->description = $this->post->description;
        $this->seo_title = $this->post->seo_title;
        $this->seo_desc = $this->post->seo_desc;
        $this->home = $this->post->home;
        $this->category_id = $this->post->category_id;
    }

    public function store()
    {
        if ($this->isEdit) {
            $this->rules['img'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
            $this->rules['thumb'] = ['nullable', 'image', 'mimes:jpg,png', 'max:2024'];
        } else {
            $this->post = new Blog();
        }

        $this->validate();

        $post = $this->post;

        $post->fill($this->only(['title', 'slug', 'entry', 'active', 'description', 'seo_title', 'seo_desc', 'home', 'category_id']));

        if ($this->thumb) {
            if ($post->thumb) {
                // Storage::delete($post->thumb);
            }
            $post->thumb = $this->upload_image($post->title, 'posts/thumb', $this->thumb);
        }
        if ($this->img) {

            if ($post->img) {
                // Storage::delete($post->img);
            }
            $post->img = $this->upload_image($post->title, 'posts', $this->img);
        }

        $post->save();

        $this->selectedTags = array_map('intval', $this->selectedTags);

        $post->tags()->sync($this->selectedTags);

        return redirect()->route('dashboard.posts.index')->with('success', 'Registro Guardados');
    }

    public function render()
    {

        $categoryList = Category::select('id', 'name')->where('active', true)->get();
        $tagList = Tag::select('id', 'name')->where('active', true)->get();
        // dd($categoryList);
        return view('livewire.post.post-create', compact('categoryList', 'tagList'));
    }
}
