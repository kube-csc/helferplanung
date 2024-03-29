<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Event;
use App\Models\OperationalLocation;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetabelHelperListsRelationManager extends RelationManager
{
    protected static ?string $modelLabel = 'Einsatzplan';
    protected static ?string $pluralModelLabel = 'Einsatzpläne';
    protected static string $relationship = 'TimetabelHelperLists';

    public static function form(Form $form): Form
    {
        return $form
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('operationalLocation.einsatzort')
                    ->label('Einsatzort')
                    ->searchable(),
                TextColumn::make('datum')
                    ->label('Datum')
                    ->dateTime('d.m.Y')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('startZeit')
                    ->label('Start Zeit')
                    ->dateTime('H:i')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('endZeit')
                    ->label('End Zeit')
                    ->dateTime('H:i')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
