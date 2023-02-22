<?php

namespace App\Filament\Resources\TimetabelHelperListResource\Pages;

use App\Filament\Resources\TimetabelHelperListResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimetabelHelperList extends EditRecord
{
    protected static string $resource = TimetabelHelperListResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
