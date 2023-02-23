<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nachname')
                    ->maxLength(40),
                Forms\Components\TextInput::make('vorname')
                    ->maxLength(40),
                Forms\Components\TextInput::make('geschlecht')
                    ->maxLength(1),
                Forms\Components\DatePicker::make('geburtsdatum'),
                Forms\Components\DatePicker::make('vereinseintritt'),
                Forms\Components\DatePicker::make('vereinsaustritt'),
                Forms\Components\TextInput::make('sportSections_id')
                    ->required(),
                Forms\Components\TextInput::make('password_alt')
                    ->password()
                    ->maxLength(20),
                Forms\Components\TextInput::make('webspace')
                    ->required(),
                Forms\Components\TextInput::make('regattatrainer')
                    ->required(),
                Forms\Components\TextInput::make('trainernachricht')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('gewicht')
                    ->required(),
                Forms\Components\TextInput::make('position')
                    ->required(),
                Forms\Components\TextInput::make('seite')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('role')
                    ->required(),
                Forms\Components\TextInput::make('vorstand_id')
                    ->required(),
                Forms\Components\Textarea::make('beschreibung')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('telefon')
                    ->tel()
                    ->required()
                    ->maxLength(25),
                Forms\Components\TextInput::make('userPortraet')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('pixx')
                    ->required(),
                Forms\Components\TextInput::make('pixy')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('two_factor_secret')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->maxLength(65535),
                Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                Forms\Components\TextInput::make('current_team_id'),
                Forms\Components\Textarea::make('profile_photo_path')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nachname'),
                Tables\Columns\TextColumn::make('vorname'),
                Tables\Columns\TextColumn::make('geschlecht'),
                Tables\Columns\TextColumn::make('geburtsdatum')
                    ->date(),
                Tables\Columns\TextColumn::make('vereinseintritt')
                    ->date(),
                Tables\Columns\TextColumn::make('vereinsaustritt')
                    ->date(),
                Tables\Columns\TextColumn::make('sportSections_id'),
                Tables\Columns\TextColumn::make('webspace'),
                Tables\Columns\TextColumn::make('regattatrainer'),
                Tables\Columns\TextColumn::make('trainernachricht'),
                Tables\Columns\TextColumn::make('gewicht'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('seite'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('vorstand_id'),
                Tables\Columns\TextColumn::make('beschreibung'),
                Tables\Columns\TextColumn::make('telefon'),
                Tables\Columns\TextColumn::make('userPortraet'),
                Tables\Columns\TextColumn::make('pixx'),
                Tables\Columns\TextColumn::make('pixy'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('two_factor_secret'),
                Tables\Columns\TextColumn::make('two_factor_recovery_codes'),
                Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('current_team_id'),
                Tables\Columns\TextColumn::make('profile_photo_path'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
