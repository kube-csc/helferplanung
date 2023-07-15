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
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'Mitglied';
    protected static ?string $pluralModelLabel = 'Mitglieder';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Mitgliederverwaltung';

    //protected static bool $shouldRegisterNavigation = false;

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
                    ->columnSpan(6)
                    ->email()
                    ->unique()
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->columnSpan(12)
                    ->password()
                    ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->same('passwordConfirmation')
                    ->dehydrated(fn ($state) => filled($state))
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                TextInput::make('passwordConfirmation')
                    ->columnSpan(12)
                    ->password()
                    ->label('Password Confirmation')
                    ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord)
                    ->minLength(8)
                    ->dehydrated(false)
                //TextInput::make('current_team_id'),
            ])
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nachname')
                    ->searchable(),
                TextColumn::make('vorname')
                    ->searchable(),
                TextColumn::make('geschlecht'),
                TextColumn::make('telefon'),
                TextColumn::make('name')
                    ->label('Benutzername'),
                TextColumn::make('email'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make('trashed'),
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
