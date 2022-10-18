<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyResource\Pages;
use App\Filament\Resources\FamilyResource\RelationManagers;
use App\Models\Family;
use App\Models\Country;
use App\Models\City;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyResource extends Resource
{
    protected static ?string $model = Family::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('family_no')
                ->label('Family No'),

                Select::make('type')
                ->options(getFamilType())->required(),

                Forms\Components\TextInput::make('name')
                ->required(),

                Forms\Components\TextInput::make('address')
                ->required(),

                Forms\Components\TextInput::make('occupation'),

                Forms\Components\TextInput::make('mobile')
                ->required(),

                Forms\Components\TextInput::make('home_mobile'),

                Forms\Components\TextInput::make('email')->email(),

                Select::make('country_id')
                ->label('Country')
                ->options(Country::all()->pluck('name', 'id')->toArray())
                ->reactive()
                ->afterStateUpdated(fn(callable $set ) => $set('city_id', null)),

                Select::make('city_id')
                ->label('City')
                ->options(function(callable $get){
                    $country = Country::find($get('country_id'));
                    if(!$country){
                       return City::all()->pluck('name', 'id');
                    }

                    return $country->cities->pluck('name', 'id');
                    
                }),

                Select::make('identity_id')->relationship('identity', 'type'),
                
              ]) ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('family_no')->sortable()->searchable(),
                 TextColumn::make('name')->sortable()->searchable(),
                 TextColumn::make('mobile')->searchable(),
                 TextColumn::make('email')->searchable(),
                 TextColumn::make('city.name')->searchable()
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
            'index' => Pages\ListFamilies::route('/'),
            'create' => Pages\CreateFamily::route('/create'),
            'edit' => Pages\EditFamily::route('/{record}/edit'),
        ];
    }    
}
