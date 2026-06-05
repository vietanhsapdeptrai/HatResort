<?php

namespace App\Filament\Admin\Resources\RoomsResource\Pages;

use App\Filament\Admin\Resources\RoomsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRooms extends ListRecords
{
    protected static string $resource = RoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
