<?php

namespace App\Filament\Resources\PortafolioResource\Pages;

use App\Filament\Resources\PortafolioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortafolios extends ListRecords
{
    protected static string $resource = PortafolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
