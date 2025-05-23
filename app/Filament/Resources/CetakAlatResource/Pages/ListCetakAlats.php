<?php

namespace App\Filament\Resources\CetakAlatResource\Pages;

use App\Filament\Resources\CetakAlatResource;
use Filament\Resources\Pages\ListRecords;

class ListCetakAlats extends ListRecords
{
    protected static string $resource = CetakAlatResource::class;

    public $alatIdToPrint = null;

    protected function getListeners(): array
    {
        return array_merge(parent::getListeners(), [
            'open-print-modal' => 'openPrintModal',
        ]);
    }

    public function openPrintModal($payload)
    {
        $this->alatIdToPrint = $payload['alatId'];
        $this->dispatchBrowserEvent('show-print-modal');
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Pages\Actions\Action::make('downloadAllPdf')
                ->label('Download Semua Alat')
                ->url(route('cetak-semua-alat.downloadPdf'))
                ->openUrlInNewTab(),
        ];
    }
}
