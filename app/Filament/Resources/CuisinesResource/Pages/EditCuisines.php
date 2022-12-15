<?php

namespace App\Filament\Resources\CuisinesResource\Pages;

use App\Filament\Resources\CuisinesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuisines extends EditRecord
{
    protected static string $resource = CuisinesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
