<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'longDescription' => $this->long_description,
            'image' => $this->image ? url($this->image) : null,
            'tags' => ProjectTagResource::collection($this->whenLoaded('tags')),
            'year' => $this->year,
            'role' => $this->role,
            'duration' => $this->duration,
            'liveUrl' => $this->live_url,
            'githubUrl' => $this->github_url,
            'isFeatured' => $this->is_featured,
            'features' => ProjectFeatureResource::collection($this->whenLoaded('features')),
            'challenges' => ProjectChallengeResource::collection($this->whenLoaded('challenges')),
            'gallery' => ProjectGalleryResource::collection($this->whenLoaded('gallery')),
            'createdAt' => $this->created_at?->toISOString(),
            'updatedAt' => $this->updated_at?->toISOString(),
        ];
    }
}