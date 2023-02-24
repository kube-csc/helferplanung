<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Resources\EventResource\RelationManagers\TimetabelHelperListsRelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $modelLabel = 'Termin';
    protected static ?string $pluralModelLabel = 'Termine';
    protected static ?string $navigationGroup = 'Termine';

    public static function form(Form $form): Form
    {
        return $form->schema(
            Card::make()
                ->columns(12)
                ->schema([
                    TextInput::make('ueberschrift')
                        ->columnSpan(12),
                    TextInput::make('datumvon')
                        ->label('von Datum')
                        ->columnSpan(6),
                    TextInput::make('datumbis')
                        ->label('bis Datum')
                        ->columnSpan(6),
                ])
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ueberschrift')
                    ->label('Event')
                    ->searchable(),
                TextColumn::make('datumvon')
                    ->label('von Datum')
                    ->sortable()
                    ->searchable()
                    ->date(),
                TextColumn::make('datumbis')
                    ->label('bis Datum')
                    ->date(),
                TextColumn::make('regatta')
                    ->label('Regattamodus')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TimetabelHelperListsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            //'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            //'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
