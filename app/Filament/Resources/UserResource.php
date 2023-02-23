<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Mitglied';
    protected static ?string $pluralModelLabel = 'Mitglieder';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Mitgliederverwaltung';
    public static function form(Form $form): Form
    {
        return $form->schema(
        Card::make()
            ->columns(12)
            ->schema([
                TextInput::make('name')
                    ->label('Benutzername')
                    ->columnSpan(12)
                    ->maxLength(255),
                TextInput::make('nachname')
                    ->columnSpan(6)
                    ->required()
                    ->maxLength(40),
                TextInput::make('vorname')
                    ->columnSpan(6)
                    ->required()
                    ->maxLength(40),
                Radio::make('geschlecht')
                    ->columnSpan(3)
                    ->required()
                    ->options([
                        'm' => 'männlich',
                        'w' => 'weiblich'
                    ]),
                hidden::make('role')
                    ->default('1'),
                TextInput::make('telefon')
                    ->columnSpan(3)
                    ->tel()
                    ->required()
                    ->maxLength(25),
                TextInput::make('email')
                    ->columnSpan(3)
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->columnSpan(12)
                    ->password()
                    ->required()
                    ->maxLength(255),
                //TextInput::make('current_team_id'),
            ])
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nachname'),
                TextColumn::make('vorname'),
                TextColumn::make('geschlecht'),
                TextColumn::make('telefon'),
                TextColumn::make('name')
                    ->label('Benutzername'),
                TextColumn::make('email'),
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
