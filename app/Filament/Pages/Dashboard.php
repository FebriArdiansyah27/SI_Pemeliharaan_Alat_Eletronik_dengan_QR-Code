<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\JumlahAlatWidget;
use App\Filament\Widgets\JumlahPemeliharaanWidget;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'Dashboard';

    protected static ?string $title = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            JumlahAlatWidget::class,
            JumlahPemeliharaanWidget::class,
        ];
    }
}
