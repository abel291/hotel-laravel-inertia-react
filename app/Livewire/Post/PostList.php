<?php

namespace App\Livewire\Post;

use App\Models\Blog;
use App\Traits\WithSorting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    public $label = 'Post';
    public $labelPlural = 'Posts';

    public $open_modal_confirmation_delete = false;

    use WithSorting;
    use WithPagination;

    public function delete($id)
    {
        $post = Blog::findOrFail($id);
        //Storage::delete([$post->img,$post->thumb]);
        $post->delete();
        $this->open_modal_confirmation_delete = false;
        $this->dispatch('renderBlogList');

        $this->dispatch('toast', title: 'Registro Eliminado');
    }

    #[On('renderBlogList')]
    public function render()
    {
        $list = Blog::select('id', 'title', 'slug', 'entry', 'active', 'thumb', 'updated_at')->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(24);

        return view('livewire.post.post-list', compact('list'));
    }
}
