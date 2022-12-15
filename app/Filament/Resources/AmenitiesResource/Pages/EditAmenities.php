<?php

namespace App\Filament\Resources\AmenitiesResource\Pages;

use App\Filament\Resources\AmenitiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmenities extends EditRecord
{
    protected static string $resource = AmenitiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
