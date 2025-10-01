<?php

namespace App\Filament\Resources\FilamentProjectResource\Pages;

use App\Filament\Resources\FilamentProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilamentProject extends EditRecord
{
    protected static string $resource = FilamentProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
