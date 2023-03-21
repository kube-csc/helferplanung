<?php

namespace App\Filament\Resources\OperationalBookingResource\Pages;

use App\Filament\Resources\OperationalBookingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOperationalBookings extends ListRecords
{
    protected static string $resource = OperationalBookingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
