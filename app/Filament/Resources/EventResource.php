<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Resources\EventResource\RelationManagers\TimetabelHelperListsRelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
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
                    DatePicker::make('datumvon')
                        ->label('von Datum')
                        ->displayFormat('d.m.Y')
                        ->columnSpan(3),
                    DatePicker::make('datumbis')
                        ->label('bis Datum')
                        ->displayFormat('d.m.Y')
                        ->columnSpan(3),
                    Toggle::make('regatta')
                        ->columnSpan(3),
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
                    ->dateTime('d.m.Y')
                    ->searchable(),
                TextColumn::make('datumbis')
                    ->label('bis Datum')
                    ->dateTime('d.m.Y'),
                TextColumn::make('regatta')
                    ->label('Regattamodus')
                    ->searchable(),
                BooleanColumn::make('regatta')
                    ->visibleFrom('md'),
            ])
            ->filters([
                Filter::make('regatta')
                    ->query(fn (Builder $query): Builder =>
                    $query->where('regatta', '1'))
                          ->default(),
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
