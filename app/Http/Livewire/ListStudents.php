<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Student;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Livewire\Component;

use Filament\Tables\Columns;
class ListStudents extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Student::query();
    }
    protected function getTableColumns(): array
    {
        return [
            Columns\ImageColumn::make('photo_path')->label('Photo'),
            Columns\TextColumn::make('name'),
            Columns\TextColumn::make('grade.name')->label('Grade'),
            Columns\TextColumn::make('section.name')->label('Section'),
        ];
    }

    public function render()
    {
        return view('livewire.list-students');
    }
}
