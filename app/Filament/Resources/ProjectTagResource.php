<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectTagResource\Pages;
use App\Models\ProjectTag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectTagResource extends Resource
{
    protected static ?string $model = ProjectTag::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Project V2';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => 
                        $set('slug', Str::slug($state))
                    ),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\ColorPicker::make('color')
                    ->helperText('Choose a color for this tag badge'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn ($record) => $record->color ?? 'gray'),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ColorColumn::make('color'),

                Tables\Columns\TextColumn::make('projects_count')
                    ->counts('projects')
                    ->label('Projects')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProjectTags::route('/'),
        ];
    }
}