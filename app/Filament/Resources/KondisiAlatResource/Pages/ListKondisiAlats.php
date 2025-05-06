<?php

namespace App\Filament\Resources\KondisiAlatResource\Pages;

use App\Filament\Resources\KondisiAlatResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\CreateAction;

class ListKondisiAlats extends ListRecords
{
    protected static string $resource = KondisiAlatResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
