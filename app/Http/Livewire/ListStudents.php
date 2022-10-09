<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Student;

use Illuminate\Contracts\View\View;
use Livewire\Component;

use Filament\Tables;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;

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
            Columns\ColorColumn::make('section.color')->label('Section'),
            Columns\TextColumn::make('grade.name')->label('Grade'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filters\SelectFilter::make('branch_id')
                ->label('Filter By Branch')
                ->options(Branch::all()->pluck('name', 'id')),
            Filters\SelectFilter::make('grade_id')
                ->label('Filter By Grade')
                ->options(Grade::all()->pluck('name', 'id')),
            Filters\SelectFilter::make('section_id')
                ->label('Filter By Section')
                ->options(Section::all()->pluck('name', 'id')),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\Action::make('edit')
                ->url(fn (Student $record): string => route('student.edit', $record))
        ];
    }

    public function render()
    {
        return view('livewire.list-students');
    }
}
