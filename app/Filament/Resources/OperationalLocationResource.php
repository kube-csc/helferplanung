<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationalLocationResource\Pages;
use App\Filament\Resources\OperationalLocationResource\RelationManagers;
use App\Models\OperationalLocation;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OperationalLocationResource extends Resource
{
    protected static ?string $model = OperationalLocation::class;
    protected static ?string $modelLabel = 'Einsatzort';
    protected static ?string $pluralModelLabel = 'Einsatzorte';
    protected static ?string $navigationIcon = 'heroicon-o-location-marker';
    protected static ?string $navigationGroup = 'Einsatzplaner';
    public static function form(Form $form): Form
    {
        return $form->schema(
           Card::make()
            ->schema([
               TextInput::make('einsatzort')
                    ->required()
                    ->maxLength(50),
               RichEditor::make('beschreibung')
                    ->toolbarButtons([
                            'bulletList',
                            'h2',
                            'h3',
                            'orderedList',
                            'redo',
                            'strike',
                            'undo',
                        ])
                    ->maxLength(65535),
               hidden::make('autor_id')
                   ->default(auth()->id()),
               hidden::make('bearbeiter_id')
                   ->default(auth()->id()),

            ])
        );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('einsatzort')
                ->sortable(),
                Tables\Columns\TextColumn::make('beschreibung')
                ->limit(50)
                ->tooltip(fn (Model $record): string => "{$record->beschreibung}")
            ])
            ->defaultSort('einsatzort')
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
            'index' => Pages\ListOperationalLocations::route('/'),
            'create' => Pages\CreateOperationalLocation::route('/create'),
            'edit' => Pages\EditOperationalLocation::route('/{record}/edit'),
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
