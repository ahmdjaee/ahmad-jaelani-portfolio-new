<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectFeature extends Model
{
    protected $fillable = ['filament_project_id', 'feature', 'order'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(FilamentProject::class);
    }
}