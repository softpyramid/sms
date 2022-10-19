<?php

namespace App\Filament\Resources\StudentGroupResource\Pages;

use App\Filament\Resources\StudentGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentGroup extends CreateRecord
{
    protected static string $resource = StudentGroupResource::class;
}
