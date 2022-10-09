<?php

namespace App\Http\Livewire;


use App\Models\Branch;
use App\Models\School;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

use App\Models\Student;

class EditStudent extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public School $school;
    public Branch $branch;
    public Student $student;

    public function mount($id = null): void
    {
        //Temporarily choosing current active school. in production it will pick from settings
        $this->branch = Branch::first();
        $this->school = $this->branch->school;

        $data = [];
        if(isset($id))
        {
            $this->student = Student::find($id);

            $data = [
                'name' => $this->student->name,
                'photo_path' => $this->student->photo_path,

                'section_id' => $this->student->section_id,
                'grade_id' => $this->student->grade_id,
                'branch_id' => $this->student->branch_id,

            ];
        }

        $this->form->fill($data);

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

    public function update()
    {

        $this->student->update($this->form->getState());

        return redirect()->route('students');
    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}