<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentGroupResource\Pages;
use App\Filament\Resources\StudentGroupResource\RelationManagers;
use App\Models\Branch;
use App\Models\StudentGroup;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentGroupResource extends Resource
{
    protected static ?string $model = StudentGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->required()
                    ->options(Branch::all()->pluck('name', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('branch.name'),

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
            'index' => Pages\ListStudentGroups::route('/'),
            'create' => Pages\CreateStudentGroup::route('/create'),
            'edit' => Pages\EditStudentGroup::route('/{record}/edit'),
        ];
    }
}
