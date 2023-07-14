<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Radio;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                ->placeholder('Enter Name')
                ->required('')
                ->disableAutocomplete(),
                TextInput::make('email')
                ->email()
                ->disableAutocomplete(),
                TextInput::make('phone')
                ->numeric()
                ->length(10)
                ->disableAutocomplete(),
                TextInput::make('Address')
                ->disableAutocomplete(),
                Radio::make('gender')
                ->options([
                    'male' => 'male',
                    'female' => 'female'
                       ])
                ,
                TextInput::make('join_date')
                ->disableAutocomplete(),
                TextInput::make('medium')
                ->disableAutocomplete(),
                TextInput::make('profile_photo')
                ->disableAutocomplete(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
