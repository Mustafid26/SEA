<?php

namespace App\Filament\Resources\PretestUserResource\Pages;

use App\Filament\Resources\PretestUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPretestUsers extends ListRecords
{
    protected static string $resource = PretestUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
