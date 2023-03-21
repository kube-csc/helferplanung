<?php

namespace App\Filament\Resources\OperationalBookingResource\Pages;

use App\Filament\Resources\OperationalBookingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperationalBooking extends EditRecord
{
    protected static string $resource = OperationalBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
