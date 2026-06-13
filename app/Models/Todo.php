<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
        'completed_at',
        'order',
        'tags',
    ];

    protected $casts = [
        'due_date' => 'date',
        'completed_at' => 'datetime',
        'tags' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isOverdue(): bool
    {
        return $this->due_date && 
               $this->due_date->isPast() && 
               $this->status !== 'completed' && 
               $this->status !== 'cancelled';
    }

    public function isDueToday(): bool
    {
        return $this->due_date && 
               $this->due_date->isToday() && 
               $this->status !== 'completed' && 
               $this->status !== 'cancelled';
    }

    public function isDueSoon(): bool
    {
        return $this->due_date && 
               $this->due_date->isFuture() && 
               $this->due_date->diffInDays(now()) <= 3 && 
               $this->status !== 'completed' && 
               $this->status !== 'cancelled';
    }

    public function scopeOverdue($query)
    {
        return $query->whereDate('due_date', '<', now())
                    ->whereNotIn('status', ['completed', 'cancelled']);
    }

    public function scopeDueToday($query)
    {
        return $query->whereDate('due_date', now())
                    ->whereNotIn('status', ['completed', 'cancelled']);
    }

    public function scopeHighPriority($query)
    {
        return $query->whereIn('priority', ['high', 'urgent']);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', 'in_progress');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($todo) {
            if (auth()->check() && !$todo->user_id) {
                $todo->user_id = auth()->id();
            }
        });

        static::updating(function ($todo) {
            if ($todo->status === 'completed' && !$todo->completed_at) {
                $todo->completed_at = now();
            }
            
            if ($todo->status !== 'completed' && $todo->completed_at) {
                $todo->completed_at = null;
            }
        });
    }
}