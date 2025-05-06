<?php

namespace App\Filament\Resources\HalamanPublicResource\Pages;

use App\Filament\Resources\HalamanPublicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHalamanPublics extends ListRecords
{
    protected static string $resource = HalamanPublicResource::class;

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
            \Filament\Pages\Actions\Action::make('generateAllHalamanPublic')
                ->label('Generate Semua QR Code')
                ->icon('heroicon-m-qr-code')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function () {
                    $alatIds = \App\Models\Alat::pluck('alat_id');
                    $jumlah = 0;

                    foreach ($alatIds as $alatId) {
                        $halamanPublic = \App\Models\HalamanPublic::updateOrCreate(
                            ['alat_id' => $alatId],
                            ['url_qrcode' => url('/informasi-pemeliharaan-alat/' . $alatId)]
                        );
                        $halamanPublic->generateQrCode();
                        $jumlah++;
                    }

                    \Filament\Notifications\Notification::make()
                        ->title("Berhasil generate QR Code untuk {$jumlah} alat.")
                        ->success()
                        ->send();
                }),

            \Filament\Pages\Actions\Action::make('generateAllHalaman')
                ->label('Generate Semua Halaman')
                ->icon('heroicon-m-document-text')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $alatIds = \App\Models\Alat::pluck('alat_id');
                    $jumlah = 0;

                    foreach ($alatIds as $alatId) {
                        \App\Models\HalamanPublic::updateOrCreate(
                            ['alat_id' => $alatId],
                            ['url_qrcode' => url('/informasi-pemeliharaan-alat/' . $alatId)]
                        );
                        $jumlah++;
                    }

                    \Filament\Notifications\Notification::make()
                        ->title("Berhasil generate halaman untuk {$jumlah} alat.")
                        ->success()
                        ->send();
                }),

        ];
    }

}


