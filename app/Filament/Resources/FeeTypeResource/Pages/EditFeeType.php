<?php

namespace App\Filament\Resources\FeeTypeResource\Pages;

use App\Filament\Resources\FeeTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeeType extends EditRecord
{
    protected static string $resource = FeeTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
