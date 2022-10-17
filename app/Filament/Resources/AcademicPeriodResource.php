<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicPeriodResource\Pages;
use App\Filament\Resources\AcademicPeriodResource\RelationManagers;
use App\Models\AcademicPeriod;
use App\Models\AcademicYear;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AcademicPeriodResource extends Resource
{
    protected static ?string $model = AcademicPeriod::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

                Forms\Components\Select::make('academic_year_id')
                ->required()
                ->label('Academic Year')
                ->options(AcademicYear::all()->pluck('name', 'id')),

                Forms\Components\DatePicker::make('date_from')
                ->label('Date From')
                ->required(),

                Forms\Components\DatePicker::make('date_to')
                ->label('Date To')
                ->required(),
                
                Toggle::make('is_active')->label(__('Active?'))->inline(false),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('date_from')->label('Start Date')->date(),
                Tables\Columns\TextColumn::make('date_to')->label('End Date')->date(),
                Tables\Columns\BooleanColumn::make('is_active')
                ->falseIcon('heroicon-o-x-circle') 
                ->trueIcon('heroicon-s-check-circle')
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
            'index' => Pages\ListAcademicPeriods::route('/'),
            'create' => Pages\CreateAcademicPeriod::route('/create'),
            'edit' => Pages\EditAcademicPeriod::route('/{record}/edit'),
        ];
    }    
}
