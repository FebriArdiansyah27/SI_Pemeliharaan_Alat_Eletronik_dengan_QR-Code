<?php

namespace App\Filament\Resources\CetakQrCodeResource\Pages;

use App\Filament\Resources\CetakQrCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCetakQrCodes extends ListRecords
{
    protected static string $resource = CetakQrCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
