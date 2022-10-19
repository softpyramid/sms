<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentStatusResource\Pages;
use App\Filament\Resources\StudentStatusResource\RelationManagers;
use App\Models\StudentStatus;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentStatusResource extends Resource
{
    protected static ?string $model = StudentStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudentStatuses::route('/'),
            'create' => Pages\CreateStudentStatus::route('/create'),
            'edit' => Pages\EditStudentStatus::route('/{record}/edit'),
        ];
    }
}
