<?php

namespace App\Filament\Resources\CuisinesResource\Pages;

use App\Filament\Resources\CuisinesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuisines extends ListRecords
{
    protected static string $resource = CuisinesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
