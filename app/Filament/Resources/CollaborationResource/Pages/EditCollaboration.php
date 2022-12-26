<?php

namespace App\Filament\Resources\CollaborationResource\Pages;

use App\Filament\Resources\CollaborationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCollaboration extends EditRecord
{
    protected static string $resource = CollaborationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
