<?php

namespace App\Livewire\Admin\Blog;

use App\Livewire\Forms\BlogForm;
use App\Models\Blog;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public BlogForm $form;
    public $blog;
    public function mount(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $this->form->setBlog($blog);
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'Blog updated successfully.');
        return $this->redirect(route('admin.blogs'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.blog.edit');
    }
}
