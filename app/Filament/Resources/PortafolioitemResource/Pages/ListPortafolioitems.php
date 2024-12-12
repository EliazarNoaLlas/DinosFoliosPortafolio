<?php

namespace App\Filament\Resources\PortafolioitemResource\Pages;

use App\Filament\Resources\PortafolioitemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortafolioitems extends ListRecords
{
    protected static string $resource = PortafolioitemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
