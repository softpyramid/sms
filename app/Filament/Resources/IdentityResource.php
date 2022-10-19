<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdentityResource\Pages;
use App\Filament\Resources\IdentityResource\RelationManagers;
use App\Models\Identity;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\TemporaryUploadedFile;

class IdentityResource extends Resource
{
    protected static ?string $model = Identity::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                   Select::make('type')->options(getIdentity())->required(),

                   Forms\Components\TextInput::make('identity_no'),

                   Forms\Components\Fieldset::make('Identity photo')
                    ->schema([
                        Forms\Components\FileUpload::make('photo_path')
                            ->label('Choose an image')
                            ->image()
                            ->directory('photos')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return (string) str($file->getClientOriginalName())->prepend('identity-photo-');
                            })
                    ])
                ]) ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),

                Tables\Columns\TextColumn::make('identity_no'),

                Tables\Columns\ImageColumn::make('photo_path')->label('Photo'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListIdentities::route('/'),
            'create' => Pages\CreateIdentity::route('/create'),
            'edit' => Pages\EditIdentity::route('/{record}/edit'),
        ];
    }    
}
