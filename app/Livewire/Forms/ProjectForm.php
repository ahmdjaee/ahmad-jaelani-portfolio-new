<?php

namespace App\Livewire\Forms;

use App\Mail\SendEmail;
use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    public ?Project $project;
    public $name = '';
    public $description = '';
    public $category = 'app';
    #[Validate('image|max:5024')]
    public $thumbnail;
    #[Validate(['images.*' => 'image|max:5024'])]
    public $images = [];
    public $project_information = '';
    public $detail_features = '';
    public $is_best;

    public function setProject(Project $project)
    {
        $this->project = $project;

        $this->name = $project->name;
        $this->description = $project->description;
        $this->category = $project->category;
        $this->project_information = $project->project_information;
        $this->detail_features = $project->detail_features;
        $this->is_best = $project->is_best;

        // Ensure thumbnail and images are set correctly
        $this->thumbnail = $project->thumbnail ? asset($project->thumbnail) : null; // Ensure thumbnail is set correctly
        $this->images = $project->images
            ->map(fn($image) => asset($image->url))
            ->toArray() ?? []; // Ensure images are set correctly

    }
    public function store()
    {
        $this->validate();
        $project = new Project();

        if (!empty($this->thumbnail)) {
            $this->thumbnail->store(path: 'photos/thumbnail', options: 'public');
            $pathName = '/photos/thumbnail/' . $this->thumbnail->hashName();

            $project->thumbnail = $pathName;

        }

        $project = $project->create([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'project_information' => $this->project_information,
            'detail_features' => $this->detail_features,
            'thumbnail' => $project->thumbnail,
            'is_best' => (boolean) $this->is_best,
        ]);

        try {
            if (!empty($this->images)) {
                foreach ($this->images as $image) {
                    $image->store(path: 'photos/images', options: 'public');
                    $pathName = '/photos/images/' . $image->hashName();
                    Image::create([
                        'url' => $pathName,
                        'project_id' => $project->id,
                    ]);
                }
            }
        } catch (\Exception $th) {
            Mail::to('ahmadjaelani8685@gmail.com', 'portfolio-app')->send(new SendEmail([
                'subject' => 'Error storing images',
                'email' => 'portfolioapp@gmail.com',
                'name' => 'Portfolio App',
                'message' => $th->getMessage(),
            ]));

        }
    }

    public function update()
    {
        $project = $this->project;

        if (!empty($this->thumbnail) && !is_string($this->thumbnail)) {
            $this->thumbnail->store(path: 'photos/thumbnail', options: 'public');
            $pathName = 'photos/thumbnail/' . $this->thumbnail->hashName();

            $project->thumbnail = $pathName;

        }

        $project->update([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->category,
            'project_information' => $this->project_information,
            'detail_features' => $this->detail_features,
            'thumbnail' => $project->thumbnail,
            'is_best' => (boolean) $this->is_best,

        ]);

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                if (!is_string($image)) {
                    $image->store(path: 'photos/images', options: 'public');
                    $pathName = 'photos/images/' . $image->hashName();
                    Image::create([
                        'url' => $pathName,
                        'project_id' => $project->id,
                    ]);
                }

            }
        }

    }
}
