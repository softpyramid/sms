<?php

namespace App\Filament\Resources\IdentityResource\Pages;

use App\Filament\Resources\IdentityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIdentity extends CreateRecord
{
    protected static string $resource = IdentityResource::class;

    protected function getRedirectUrl(): string
	{
	    return $this->getResource()::getUrl('index');
	}
}
