<?php

namespace App\Filament\Resources\FamilyResource\Pages;

use App\Filament\Resources\FamilyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamily extends EditRecord
{
    protected static string $resource = FamilyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
	{
	    return $this->getResource()::getUrl('index');
	}
}
