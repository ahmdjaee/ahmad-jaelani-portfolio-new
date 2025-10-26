<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TodoResource\Pages;
use App\Models\Todo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Enums\FontWeight;

class TodoResource extends Resource
{
    protected static ?string $model = Todo::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    
    protected static ?string $navigationLabel = 'Todo List';
    
    protected static ?string $navigationGroup = 'Tasks';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Task Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter task title')
                            ->columnSpanFull(),
                        
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->placeholder('Add task description...')
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('priority')
                            ->options([
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'urgent' => 'Urgent',
                            ])
                            ->default('medium')
                            ->required()
                            ->native(false)
                            ->selectablePlaceholder(false),
                        
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'in_progress' => 'In Progress',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required()
                            ->native(false)
                            ->selectablePlaceholder(false),
                        
                        Forms\Components\DatePicker::make('due_date')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->placeholder('Select due date'),
                        
                        Forms\Components\TagsInput::make('tags')
                            ->placeholder('Add tags')
                            ->helperText('Press enter to add tag')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Medium)
                    ->description(fn (Todo $record): ?string => $record->description)
                    ->wrap(),
                
                Tables\Columns\BadgeColumn::make('priority')
                    ->colors([
                        'secondary' => 'low',
                        'primary' => 'medium',
                        'warning' => 'high',
                        'danger' => 'urgent',
                    ])
                    ->icons([
                        'heroicon-o-arrow-down' => 'low',
                        'heroicon-o-minus' => 'medium',
                        'heroicon-o-arrow-up' => 'high',
                        'heroicon-o-exclamation-triangle' => 'urgent',
                    ])
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'pending',
                        'info' => 'in_progress',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-arrow-path' => 'in_progress',
                        'heroicon-o-check-circle' => 'completed',
                        'heroicon-o-x-circle' => 'cancelled',
                    ])
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('due_date')
                    ->date('d M Y')
                    ->sortable()
                    ->color(fn (Todo $record) => match(true) {
                        $record->isOverdue() => 'danger',
                        $record->isDueToday() => 'warning',
                        $record->isDueSoon() => 'info',
                        default => 'secondary'
                    })
                    ->icon(fn (Todo $record) => match(true) {
                        $record->isOverdue() => 'heroicon-o-exclamation-circle',
                        $record->isDueToday() => 'heroicon-o-bell-alert',
                        $record->isDueSoon() => 'heroicon-o-bell',
                        default => null
                    })
                    ->tooltip(fn (Todo $record) => match(true) {
                        $record->isOverdue() => 'Overdue!',
                        $record->isDueToday() => 'Due Today',
                        $record->isDueSoon() => 'Due Soon',
                        default => null
                    }),
                
                Tables\Columns\TextColumn::make('tags')
                    ->badge()
                    ->separator(',')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Assigned To')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('completed_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('priority')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                        'urgent' => 'Urgent',
                    ])
                    ->multiple()
                    ->label('Priority'),
                
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->multiple()
                    ->label('Status'),
                
                Tables\Filters\Filter::make('overdue')
                    ->query(fn (Builder $query): Builder => $query->overdue())
                    ->label('Overdue Tasks')
                    ->toggle(),
                
                Tables\Filters\Filter::make('due_today')
                    ->query(fn (Builder $query): Builder => $query->dueToday())
                    ->label('Due Today')
                    ->toggle(),
                
                Tables\Filters\Filter::make('high_priority')
                    ->query(fn (Builder $query): Builder => $query->highPriority())
                    ->label('High Priority')
                    ->toggle(),
                
                Tables\Filters\Filter::make('my_tasks')
                    ->query(fn (Builder $query): Builder => $query->where('user_id', auth()->id()))
                    ->label('My Tasks')
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('mark_completed')
                        ->label('Mark as Completed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn (Todo $record) => $record->status !== 'completed')
                        ->requiresConfirmation()
                        ->action(function (Todo $record) {
                            $record->update([
                                'status' => 'completed',
                                'completed_at' => now(),
                            ]);
                        }),
                    
                    Tables\Actions\Action::make('mark_in_progress')
                        ->label('Mark as In Progress')
                        ->icon('heroicon-o-arrow-path')
                        ->color('info')
                        ->visible(fn (Todo $record) => $record->status === 'pending')
                        ->action(fn (Todo $record) => $record->update(['status' => 'in_progress'])),
                    
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_completed')
                        ->label('Mark as Completed')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $records->each->update([
                                'status' => 'completed',
                                'completed_at' => now(),
                            ]);
                        }),
                    
                    Tables\Actions\BulkAction::make('change_priority')
                        ->label('Change Priority')
                        ->icon('heroicon-o-arrow-up')
                        ->form([
                            Forms\Components\Select::make('priority')
                                ->options([
                                    'low' => 'Low',
                                    'medium' => 'Medium',
                                    'high' => 'High',
                                    'urgent' => 'Urgent',
                                ])
                                ->required(),
                        ])
                        ->action(function ($records, array $data) {
                            $records->each->update(['priority' => $data['priority']]);
                        }),
                    
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTodos::route('/'),
            'create' => Pages\CreateTodo::route('/create'),
            'edit' => Pages\EditTodo::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $urgentCount = static::getModel()::where('user_id', auth()->id())
            ->where('priority', 'urgent')
            ->whereIn('status', ['pending', 'in_progress'])
            ->count();

        return $urgentCount > 0 ? 'danger' : 'primary';
    }
}