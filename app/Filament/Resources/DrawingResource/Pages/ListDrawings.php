<?php

namespace App\Filament\Resources\DrawingResource\Pages;

use App\Filament\Resources\DrawingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDrawings extends ListRecords
{
    protected static string $resource = DrawingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
