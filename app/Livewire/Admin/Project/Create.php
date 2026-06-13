<?php

namespace App\Livewire\Admin\Project;

use App\Livewire\Forms\ProjectForm;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class Create extends Component
{
    use WithFileUploads, WithFilePond;

    public ProjectForm $form;

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Project created successfully.');
        return $this->redirect(route('admin'),navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.project.create');
    }
}
