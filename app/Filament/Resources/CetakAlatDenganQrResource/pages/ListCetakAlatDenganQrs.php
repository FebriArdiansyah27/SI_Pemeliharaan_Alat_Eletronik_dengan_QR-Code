<?php

namespace App\Filament\Resources\CetakAlatDenganQrResource\Pages;

use App\Filament\Resources\CetakAlatDenganQrResource;
use Filament\Resources\Pages\ListRecords;

class ListCetakAlatDenganQrs extends ListRecords
{
    protected static string $resource = CetakAlatDenganQrResource::class;


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
            \Filament\Pages\Actions\Action::make('printAll')
                ->label('Cetak Semua Alat')
                ->url(route('print.all.alat'))  // pindah ke halaman view
                ->openUrlInNewTab()             // buka di tab baru, enak untuk print
                ->button(),
        ];
    }

}
