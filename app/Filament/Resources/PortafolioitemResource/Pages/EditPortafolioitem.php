<?php

namespace App\Filament\Resources\PortafolioitemResource\Pages;

use App\Filament\Resources\PortafolioitemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortafolioitem extends EditRecord
{
    protected static string $resource = PortafolioitemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
