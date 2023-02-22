<?php

namespace App\Filament\Resources\TimetabelHelperListResource\Pages;

use App\Filament\Resources\TimetabelHelperListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimetabelHelperLists extends ListRecords
{
    protected static string $resource = TimetabelHelperListResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
