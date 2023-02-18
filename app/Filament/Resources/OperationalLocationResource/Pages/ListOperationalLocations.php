<?php

namespace App\Filament\Resources\OperationalLocationResource\Pages;

use App\Filament\Resources\OperationalLocationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOperationalLocations extends ListRecords
{
    protected static string $resource = OperationalLocationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
