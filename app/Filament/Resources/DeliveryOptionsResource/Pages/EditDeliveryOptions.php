<?php

namespace App\Filament\Resources\DeliveryOptionsResource\Pages;

use App\Filament\Resources\DeliveryOptionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryOptions extends EditRecord
{
    protected static string $resource = DeliveryOptionsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
