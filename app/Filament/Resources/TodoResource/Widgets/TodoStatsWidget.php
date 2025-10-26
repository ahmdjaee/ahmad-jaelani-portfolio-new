<?php

namespace App\Filament\Resources\TodoResource\Widgets;

use App\Models\Todo;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TodoStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = auth()->id();
        
        $totalTodos = Todo::where('user_id', $userId)->count();
        $pendingTodos = Todo::where('user_id', $userId)->where('status', 'pending')->count();
        $inProgressTodos = Todo::where('user_id', $userId)->where('status', 'in_progress')->count();
        $completedTodos = Todo::where('user_id', $userId)->where('status', 'completed')->count();
        $overdueTodos = Todo::where('user_id', $userId)->overdue()->count();
        $urgentTodos = Todo::where('user_id', $userId)
            ->where('priority', 'urgent')
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->count();
        
        $completionRate = $totalTodos > 0 ? round(($completedTodos / $totalTodos) * 100) : 0;

        return [
            Stat::make('Total Tasks', $totalTodos)
                ->description('All your tasks')
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->color('primary'),
            
            Stat::make('Pending', $pendingTodos)
                ->description('Tasks to start')
                ->descriptionIcon('heroicon-o-clock')
                ->color('secondary'),
            
            Stat::make('In Progress', $inProgressTodos)
                ->description('Currently working on')
                ->descriptionIcon('heroicon-o-arrow-path')
                ->color('info'),
            
            Stat::make('Completed', $completedTodos)
                ->description("{$completionRate}% completion rate")
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Overdue', $overdueTodos)
                ->description('Past due date')
                ->descriptionIcon('heroicon-o-exclamation-circle')
                ->color('danger'),
            
            Stat::make('Urgent', $urgentTodos)
                ->description('High priority tasks')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('warning'),
        ];
    }
}