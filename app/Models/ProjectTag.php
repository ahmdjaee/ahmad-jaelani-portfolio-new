<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class ProjectTag extends Model
{
    protected $fillable = ['name', 'slug', 'color'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(FilamentProject::class, 'project_project_tag');
    }
}