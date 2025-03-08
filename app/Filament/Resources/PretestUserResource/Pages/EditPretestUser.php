<?php

namespace App\Filament\Resources\PretestUserResource\Pages;

use App\Filament\Resources\PretestUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPretestUser extends EditRecord
{
    protected static string $resource = PretestUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getTitle(): string
    {
        return 'Ubah ' . ($this->record->user->name ?? 'Pretest User');
    }

}