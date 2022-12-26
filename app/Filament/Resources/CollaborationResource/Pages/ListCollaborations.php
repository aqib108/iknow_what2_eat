<?php

namespace App\Filament\Resources\CollaborationResource\Pages;

use App\Filament\Resources\CollaborationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCollaborations extends ListRecords
{
    protected static string $resource = CollaborationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
