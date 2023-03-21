<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationalBookingResource\Pages;
use App\Filament\Resources\OperationalBookingResource\RelationManagers;
use App\Models\OperationalBooking;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationalBookingResource extends Resource
{
    protected static ?string $model = OperationalBooking::class;

    protected static ?string $modelLabel = 'eingesetzte Helfer';
    protected static ?string $pluralModelLabel = 'eingesetzte Helfer';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Einsatzplaner';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /*
                Forms\Components\TextInput::make('event_id')
                    ->required(),
                Forms\Components\TextInput::make('operational_location_id')
                    ->required(),
                Forms\Components\TextInput::make('timetabel_helper_lists_id')
                    ->required(),
                Forms\Components\TextInput::make('user_id'),
                */
                Forms\Components\TextInput::make('Vorname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Nachname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                /*
                Forms\Components\DatePicker::make('datum')
                    ->required(),
                Forms\Components\TextInput::make('startZeit')
                    ->required(),
                Forms\Components\TextInput::make('endZeit')
                    ->required(),
                */
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event.ueberschrift'),
                TextColumn::make('operationalLocation.einsatzort'),
                //TextColumn::make('timetabel_helper_lists_id'),
                //TextColumn::make('user_id'),
                TextColumn::make('Vorname'),
                TextColumn::make('Nachname'),
                TextColumn::make('email'),
                TextColumn::make('datum')
                    ->date(),
                TextColumn::make('startZeit')
                    ->label('Start Zeit')
                    ->dateTime('H:i')
                    ->sortable()
                    ->alignRight(),
                TextColumn::make('endZeit')
                    ->label('End Zeit')
                    ->dateTime('H:i')
                    ->alignRight(),
            ])
            ->filters([
                //Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('event')
                    ->relationship('event', 'ueberschrift'),
                SelectFilter::make('operationalLocation')
                    ->relationship('operationalLocation', 'einsatzort')
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOperationalBookings::route('/'),
            'create' => Pages\CreateOperationalBooking::route('/create'),
            'view' => Pages\ViewOperationalBooking::route('/{record}'),
            'edit' => Pages\EditOperationalBooking::route('/{record}/edit'),
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
