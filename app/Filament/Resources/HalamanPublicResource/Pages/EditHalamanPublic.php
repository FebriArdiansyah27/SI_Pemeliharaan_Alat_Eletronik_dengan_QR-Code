<?php

namespace App\Filament\Resources\HalamanPublicResource\Pages;

use App\Filament\Resources\HalamanPublicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHalamanPublic extends EditRecord
{
    protected static string $resource = HalamanPublicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
