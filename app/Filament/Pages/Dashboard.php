<?php

namespace App\Filament\Pages;

use App\Filament\Resources\TodoResource\Widgets\TodoStatsWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            FilamentInfoWidget::class,
            TodoStatsWidget::class
        ];
    }
}