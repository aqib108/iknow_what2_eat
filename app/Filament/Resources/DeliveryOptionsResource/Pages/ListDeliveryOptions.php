<?php

namespace App\Filament\Resources\DeliveryOptionsResource\Pages;

use App\Filament\Resources\DeliveryOptionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryOptions extends ListRecords
{
    protected static string $resource = DeliveryOptionsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
