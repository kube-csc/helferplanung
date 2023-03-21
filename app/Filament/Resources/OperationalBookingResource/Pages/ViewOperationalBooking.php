<?php

namespace App\Filament\Resources\OperationalBookingResource\Pages;

use App\Filament\Resources\OperationalBookingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOperationalBooking extends ViewRecord
{
    protected static string $resource = OperationalBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
