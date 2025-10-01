<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectChallenge extends Model
{
    protected $fillable = ['filament_project_id', 'challenge', 'order'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(FilamentProject::class);
    }
}