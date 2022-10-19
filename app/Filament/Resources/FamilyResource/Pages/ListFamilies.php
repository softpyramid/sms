<?php

namespace App\Filament\Resources\FamilyResource\Pages;

use App\Filament\Resources\FamilyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilies extends ListRecords
{
    protected static string $resource = FamilyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
