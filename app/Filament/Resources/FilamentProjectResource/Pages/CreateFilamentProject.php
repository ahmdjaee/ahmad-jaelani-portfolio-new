<?php

namespace App\Filament\Resources\FilamentProjectResource\Pages;

use App\Filament\Resources\FilamentProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFilamentProject extends CreateRecord
{
    protected static string $resource = FilamentProjectResource::class;

    public function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
