<?php

namespace App\Filament\Resources\CetakQrCodeResource\Pages;

use App\Filament\Resources\CetakQrCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCetakQrCode extends EditRecord
{
    protected static string $resource = CetakQrCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
