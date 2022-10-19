<?php

namespace App\Filament\Resources\StudentGroupResource\Pages;

use App\Filament\Resources\StudentGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentGroups extends ListRecords
{
    protected static string $resource = StudentGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
