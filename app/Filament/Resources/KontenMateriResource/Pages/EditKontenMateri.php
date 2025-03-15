<?php

namespace App\Filament\Resources\KontenMateriResource\Pages;

use App\Filament\Resources\KontenMateriResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKontenMateri extends EditRecord
{
    protected static string $resource = KontenMateriResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
