<?php

namespace App\Filament\Resources\StudentStatusResource\Pages;

use App\Filament\Resources\StudentStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentStatus extends EditRecord
{
    protected static string $resource = StudentStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
