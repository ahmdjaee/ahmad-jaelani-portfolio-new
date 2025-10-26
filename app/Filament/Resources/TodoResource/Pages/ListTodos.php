<?php

namespace App\Filament\Resources\TodoResource\Pages;

use App\Filament\Resources\TodoResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTodos extends ListRecords
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Tasks')
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->count()),
            
            'pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending'))
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->where('status', 'pending')->count())
                ->badgeColor('secondary'),
            
            'in_progress' => Tab::make('In Progress')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'in_progress'))
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->where('status', 'in_progress')->count())
                ->badgeColor('info'),
            
            'overdue' => Tab::make('Overdue')
                ->modifyQueryUsing(fn (Builder $query) => $query->overdue())
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->overdue()->count())
                ->badgeColor('danger'),
            
            'high_priority' => Tab::make('High Priority')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereIn('priority', ['high', 'urgent']))
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->whereIn('priority', ['high', 'urgent'])->whereNotIn('status', ['completed', 'cancelled'])->count())
                ->badgeColor('warning'),
            
            'completed' => Tab::make('Completed')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'completed'))
                ->badge(fn () => $this->getModel()::where('user_id', auth()->id())->where('status', 'completed')->count())
                ->badgeColor('success'),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('user_id', auth()->id());
    }
}