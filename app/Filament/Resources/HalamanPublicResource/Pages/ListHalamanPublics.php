<?php

namespace App\Filament\Resources\HalamanPublicResource\Pages;

use App\Filament\Resources\HalamanPublicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHalamanPublics extends ListRecords
{
    protected static string $resource = HalamanPublicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}


