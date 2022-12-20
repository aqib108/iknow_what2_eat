<?php

namespace App\Filament\Resources\RestaurantsResource\Pages;

use App\Filament\Resources\RestaurantsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Restaurants;
class EditRestaurants extends EditRecord
{
    protected static string $resource = RestaurantsResource::class;
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
