<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'thumbnail' => $this->thumbnail ? url($this->thumbnail) : null,
            'title' => $this->title,
            'slug' => $this->slug,
            'sub_title'  => $this->sub_title,
            'published_at' => $this->published_at,
            'tags' => $this->tags,
            'content' => str($this->content)->markdown()->sanitizeHtml()
        ];
    }
}
