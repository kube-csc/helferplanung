<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetabelHelperListResource\Pages;
use App\Filament\Resources\TimetabelHelperListResource\RelationManagers;
use App\Models\OperationalLocation;
use App\Models\TimetabelHelperList;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Event;

class TimetabelHelperListResource extends Resource
{
    protected static ?string $model = TimetabelHelperList::class;

    protected static ?string $modelLabel = 'Einsatzplan';
    protected static ?string $pluralModelLabel = 'Einsatzpläne';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Einsatzplaner';
    public static function form(Form $form): Form
    {
        return $form->schema(
                   Card::make()
                     ->columns(12)
                     ->schema([
                        Select::make('event_id')
                            ->label('Veranstaltung')
                            ->columnSpan(6)
                            ->required()
                            ->options(Event::where('verwendung', '=' , '0')
                            ->where('regatta', '=' , '1')
                            ->pluck('ueberschrift', 'id'))
                            ->searchable(),
                        Select::make('operational_location_id')
                            ->label('Einsatzort')
                            ->columnSpan(6)
                            ->required()
                            ->options(OperationalLocation::all()->pluck('einsatzort', 'id'))
                            ->searchable(),
                         DatePicker::make('datum')
                             ->label('Datum')
                             ->displayFormat('d.m.Y')
                             //->minDate(now())
                             ->columnSpan(3)
                             ->required(),
                         TimePicker::make('startZeit')
                             ->label('Start Zeit')
                             ->withoutSeconds()
                             ->displayFormat('H:i')
                             ->columnSpan(3)
                             ->required(),
                         TimePicker::make('endZeit')
                             ->label('End Zeit')
                             ->withoutSeconds()
                             ->displayFormat('H:i')
                             ->columnSpan(3)
                             ->required(),
                         TimePicker::make('laenge')
                             ->label('Einsatzlänge (H:M)')
                             ->withoutSeconds()
                             ->columnSpan(3)
                             ->required(),
                         TextInput::make('anzahlHelfer')
                             ->columnSpan(3)
                             ->label('Anzahl der Helfer')
                             ->required()
                             ->minValue('1')
                             ->maxValue('5')
                             ->numeric('true'),
                    ])
       );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event.ueberschrift')
                    ->label('Event')
                    ->searchable(),
                TextColumn::make('operationalLocation.einsatzort')
                    ->label('Einsatzort')
                    ->searchable(),
                TextColumn::make('startZeit')
                    ->label('Start Datum / Zeit')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('endZeit')
                    ->label('Start Datum / Zeit')
                    ->dateTime('d.m.Y H:i')
                    ->alignRight(),
                TextColumn::make('laenge')
                    ->dateTime('H:i')
                    ->alignRight(),
                TextColumn::make('anzahlHelfer')
                    ->label('Anzahl der Helfer')
                    ->alignRight(),
            ])
            ->defaultSort('startZeit')
            ->filters([
                SelectFilter::make('event')
                    ->relationship('event', 'ueberschrift'),
                SelectFilter::make('operationalLocation')
                    ->relationship('operationalLocation', 'einsatzort')
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
            'index' => Pages\ListTimetabelHelperLists::route('/'),
            'create' => Pages\CreateTimetabelHelperList::route('/create'),
            'edit' => Pages\EditTimetabelHelperList::route('/{record}/edit'),
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
