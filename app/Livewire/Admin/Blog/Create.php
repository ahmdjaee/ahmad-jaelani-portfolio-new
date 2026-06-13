<?php

namespace App\Livewire\Admin\Blog;

use App\Livewire\Forms\BlogForm;
use Livewire\Component;

class Create extends Component
{

    public BlogForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Blog created successfully.');
        return $this->redirect(route('admin.blogs'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.blog.create');
    }
}
