<?php

namespace App\Livewire\Admin\Project;

use App\Livewire\Forms\ProjectForm;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\LivewireFilepond\WithFilePond;

class Edit extends Component
{
    use WithFileUploads, WithFilePond;

    public ProjectForm $form;
    public $project;

    public function mount(Request $request)
    {
        $project = Project::with('images')->findOrFail($request->id);
        $this->form->setProject($project);
    }

    #[On('filepond-upload-file-removed', )]
    public function removeFile($attribute, $fileName)
    {
        if ($attribute === 'form.thumbnail') {
            if (Project::where('thumbnail', $fileName)->exists()) {
                Project::where('thumbnail', $fileName)->first()->update(
                    ['thumbnail' => null]
                );
                $this->remove($attribute, $fileName);
            }
        } elseif ($attribute === 'form.images') {
            if (Image::where('url', $fileName)->exists()) {
                Image::where('url', $fileName)->delete();
                $this->remove($attribute, $fileName);
            }
        }
    }

    public function save()
    {
        $this->form->update();

        session()->flash('message', 'Project updated successfully.');
        return $this->redirect(route('admin'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.project.edit');
    }
}
