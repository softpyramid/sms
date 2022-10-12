<?php

namespace App\Filament\Resources\BranchResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class StudentsOverview extends Widget
{
    public ?Model $record = null;

    protected static string $view = 'filament.resources.branch-resource.widgets.students-overview';
}
