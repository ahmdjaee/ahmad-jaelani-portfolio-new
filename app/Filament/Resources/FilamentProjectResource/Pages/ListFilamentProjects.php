<?php

namespace App\Filament\Resources\FilamentProjectResource\Pages;

use App\Filament\Resources\FilamentProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilamentProjects extends ListRecords
{
    protected static string $resource = FilamentProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
