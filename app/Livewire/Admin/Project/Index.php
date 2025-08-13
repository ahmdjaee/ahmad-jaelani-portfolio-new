<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;

class Index extends Component
{

    public function delete(Project $project)
    {
        $project->delete();
        session()->flash('message', 'Project deleted successfully.');
    }

    public function render()
    {
        $projects = Project::orderByDesc('created_at')->get();

        return view('livewire.admin.project.index', compact('projects'));
    }
}
