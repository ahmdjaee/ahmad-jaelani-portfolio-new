<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilamentProjectResource\Pages;
use App\Filament\Resources\FilamentProjectResource\RelationManagers;
use App\Models\FilamentProject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class FilamentProjectResource extends Resource
{
    protected static ?string $model = FilamentProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn(string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('long_description')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('projects')
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(2100)
                            ->default(date('Y')),

                        Forms\Components\TextInput::make('role')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('duration')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., 3 months'),

                        Forms\Components\TextInput::make('live_url')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://example.com'),

                        Forms\Components\TextInput::make('github_url')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://github.com/username/repo'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tags')
                    ->schema([
                        Forms\Components\Select::make('tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn($state, Forms\Set $set) =>
                                        $set('slug', Str::slug($state))
                                    ),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\ColorPicker::make('color'),
                            ])
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Features')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                            ->relationship()
                            ->schema([
                                Forms\Components\Textarea::make('feature')
                                    ->required()
                                    ->rows(2),
                                Forms\Components\Hidden::make('order')
                                    ->default(0),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(
                                fn(array $state): ?string =>
                                $state['feature'] ?? null
                            )
                            ->columnSpanFull()
                            ->defaultItems(0),
                    ]),

                Forms\Components\Section::make('Challenges')
                    ->schema([
                        Forms\Components\Repeater::make('challenges')
                            ->relationship()
                            ->schema([
                                Forms\Components\Textarea::make('challenge')
                                    ->required()
                                    ->rows(2),
                                Forms\Components\Hidden::make('order')
                                    ->default(0),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(
                                fn(array $state): ?string =>
                                $state['challenge'] ?? null
                            )
                            ->columnSpanFull()
                            ->defaultItems(0),
                    ]),

                Forms\Components\Section::make('Gallery')
                    ->schema([
                        Forms\Components\Repeater::make('gallery')
                            ->relationship()
                            ->schema([
                                Forms\Components\FileUpload::make('image_path')
                                    ->label('Image')
                                    ->image()
                                    ->directory('projects/gallery')
                                    ->required(),
                                Forms\Components\TextInput::make('caption')
                                    ->maxLength(255),
                                Forms\Components\Hidden::make('order')
                                    ->default(0),
                            ])
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->columnSpanFull()
                            ->defaultItems(0),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project'),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),

                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                    ])
                    ->columns(3),
            ]);
    }

     public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->size(60)
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('tags.name')
                    ->badge()
                    ->separator(',')
                    ->color(fn ($record, $state) => 
                        $record->tags->firstWhere('name', $state)?->color ?? 'gray'
                    ),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('year')
                    ->options(fn () => 
                        FilamentProject::query()
                            ->distinct()
                            ->pluck('year', 'year')
                            ->toArray()
                    ),

                Tables\Filters\Filter::make('is_featured')
                    ->query(fn ($query) => $query->where('is_featured', true))
                    ->label('Featured Only'),

                Tables\Filters\Filter::make('is_published')
                    ->query(fn ($query) => $query->where('is_published', true))
                    ->label('Published Only'),
                    // ->default(),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('order', 'asc');
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
            'index' => Pages\ListFilamentProjects::route('/'),
            'create' => Pages\CreateFilamentProject::route('/create'),
            // 'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditFilamentProject::route('/{record}/edit'),
        ];
    }
}
