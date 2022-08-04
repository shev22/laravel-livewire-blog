<?php

namespace App\Http\Livewire;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{       
    use WithPagination;
    //public $posts;
    

    // public function mount()
    // {
    //     $this->posts = Post::orderBy('updated_at', 'DESC')->get();
        
    // }

    public function render()
    {
        return view('livewire.blog',['posts' => Post::latest()->paginate(3)]);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id);
        $post->delete();
        
      session()->flash('message', 'Your post has been deleted!');
    }
}
