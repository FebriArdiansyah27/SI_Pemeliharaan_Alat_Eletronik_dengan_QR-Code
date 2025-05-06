<?php

namespace App\Filament\Resources\HalamanPublicResource\Pages;

use App\Filament\Resources\HalamanPublicResource;
use Filament\Resources\Pages\Page;
use App\Models\HalamanPublic;

class PrintQrCode extends Page
{
    protected static string $resource = HalamanPublicResource::class;

    protected static string $view = 'filament.resources.halaman-public-resource.pages.print-qr-code';

    public $record;

    public function mount($record): void
    {
        $this->record = HalamanPublic::where('id', $record)->firstOrFail();
    }
}
