<?php

namespace App\Filament\Pages;

use Filament\Widgets\AccountWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Serat Kartini Dashboard';

    protected function getWidgets(): array
    {
        return [
            AccountWidget::class,
        ];
    }

}