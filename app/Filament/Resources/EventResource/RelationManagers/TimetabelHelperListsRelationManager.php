<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use App\Models\Event;
use App\Models\OperationalLocation;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetabelHelperListsRelationManager extends RelationManager
{
    protected static ?string $modelLabel = 'Einsatzplan';
    protected static ?string $pluralModelLabel = 'Einsatzpläne';
    protected static string $relationship = 'TimetabelHelperLists';

    protected static ?string $recordTitleAttribute = 'anzahlHelfer';

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
                DateTimePicker::make('startZeit')
                    ->label('Start Datum / Zeit')
                    ->withoutSeconds()
                    ->displayFormat('d.m.Y h:m')
                    ->minDate(now())
                    ->columnSpan(3)
                    ->required(),
                DateTimePicker::make('endZeit')
                    ->label('Start Datum / Zeit')
                    ->withoutSeconds()
                    ->displayFormat('d.m.Y h:m')
                    ->minDate(now())
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
                TextColumn::make('startZeit')
                    ->label('Start Datum / Zeit')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('endZeit')
                    ->label('Start Datum / Zeit')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('anzahlHelfer')
                    ->label('Anzahl der Helfer')
                    ->sortable()
                    ->alignRight(),
            ])
            ->filters([
                //
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
