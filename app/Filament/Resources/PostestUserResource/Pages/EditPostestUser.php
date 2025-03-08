<?php

namespace App\Filament\Resources\PostestUserResource\Pages;

use App\Filament\Resources\PostestUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostestUser extends EditRecord
{
    protected static string $resource = PostestUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
