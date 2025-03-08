<?php

namespace App\Filament\Resources\PostestUserResource\Pages;

use App\Filament\Resources\PostestUserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostestUsers extends ListRecords
{
    protected static string $resource = PostestUserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
