<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class FilamentProject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'image',
        'year',
        'role',
        'duration',
        'live_url',
        'github_url',
        'is_featured',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'year' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ProjectTag::class, 'project_project_tag');
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProjectFeature::class)->orderBy('order');
    }

    public function challenges(): HasMany
    {
        return $this->hasMany(ProjectChallenge::class)->orderBy('order');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(ProjectGallery::class)->orderBy('order');
    }
}