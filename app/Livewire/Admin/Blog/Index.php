<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class Index extends Component
{
    
    public function delete(Blog $blog)
    {
        $blog->delete();
        session()->flash('message', 'Blog deleted successfully.');
    }

    public function render()
    {
        $blogs = Blog::latest()->get();
        return view('livewire.admin.blog.index', compact('blogs'));
    }
}
