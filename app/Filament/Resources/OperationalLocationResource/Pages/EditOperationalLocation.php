<?php

namespace App\Filament\Resources\OperationalLocationResource\Pages;

use App\Filament\Resources\OperationalLocationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperationalLocation extends EditRecord
{
    protected static string $resource = OperationalLocationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
