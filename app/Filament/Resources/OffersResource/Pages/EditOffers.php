<?php

namespace App\Filament\Resources\OffersResource\Pages;

use App\Filament\Resources\OffersResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOffers extends EditRecord
{
    protected static string $resource = OffersResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
