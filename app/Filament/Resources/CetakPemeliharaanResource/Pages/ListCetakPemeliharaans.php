<?php

namespace App\Filament\Resources\CetakPemeliharaanResource\Pages;

use App\Filament\Resources\CetakPemeliharaanResource;
use Filament\Resources\Pages\ListRecords;

class ListCetakPemeliharaans extends ListRecords
{
    protected static string $resource = CetakPemeliharaanResource::class;

    public $pemeliharaanIdToPrint = null;

    protected function getListeners(): array
    {
        return array_merge(parent::getListeners(), [
            'open-print-modal' => 'openPrintModal',
        ]);
    }

    public function openPrintModal($payload)
    {
        $this->pemeliharaanIdToPrint = $payload['pemeliharaanId'];
        $this->dispatchBrowserEvent('show-print-modal');
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Pages\Actions\Action::make('downloadAllPdf')
                ->label('Download Semua Pemeliharaan PDF')
                ->url(route('cetak-semua-pemeliharaan.downloadPdf'))
                ->openUrlInNewTab(),
        ];
    }
}
