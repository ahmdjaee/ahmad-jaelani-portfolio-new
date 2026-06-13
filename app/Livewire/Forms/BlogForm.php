<?php

namespace App\Livewire\Forms;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BlogForm extends Form
{
    public ?Blog $blog;
    public string $title;
    public string $sub_title;
    public bool $published = false;
    public string $content;

    public function setBlog(Blog $blog)
    {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->sub_title = $blog->sub_title;
        $this->published = $blog->published;
        $this->content = $blog->content;
    }

    public function store()
    {

        $this->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();

        $blog->create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'sub_title' => $this->sub_title,
            'published' => $this->published,
            'published_at' => now(),
            'content' => $this->content,
        ]);
    }

    public function update()
    {
        $blog = $this->blog;

        $blog->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'sub_title' => $this->sub_title,
            'published' => $this->published,
            'content' => $this->content,
        ]);
    }
}
