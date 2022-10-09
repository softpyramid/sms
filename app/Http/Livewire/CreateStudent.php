<?php

namespace App\Http\Livewire;


use App\Models\Branch;
use App\Models\School;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

use App\Models\Student;

class CreateStudent extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public School $school;
    public Branch $branch;

    public function mount(): void
    {
        //Temporarily choosing current active school. in production it will pick from settings
        $this->branch = Branch::first();
        $this->school = $this->branch->school;

        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Hidden::make('branch_id')->default($this->branch->id),
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('grade_id')
                ->required()
                ->label('Grade')
                ->options(\App\Models\Grade::all()->pluck('name', 'id')),
            Forms\Components\Select::make('section_id')
                ->required()
                ->label('Section')
                ->options(\App\Models\Section::all()->pluck('name', 'id')),
            Forms\Components\FileUpload::make('photo_path')
                ->label('Choose a photo')
                ->image()
                ->directory('photos')
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                    return (string) str($file->getClientOriginalName())->prepend('student-photo-');
                }),
        ];
    }

    public function create()
    {

        Student::create($this->form->getState());

        Notification::make()
            ->title('Student created successfully')
            ->success()
            ->send();

        return redirect()->route('students');
    }

    public function render()
    {
        return view('livewire.create-student');
    }
}
