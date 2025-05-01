<?php

namespace App\Filament\Resources\PemeliharaanResource\Pages;

use App\Filament\Resources\PemeliharaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPemeliharaan extends EditRecord
{
    protected static string $resource = PemeliharaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Update kondisi alat setelah edit
     */
    protected function afterSave(): void
    {
        // Update kondisi alat setelah pemeliharaan diubah
        $alat = $this->record->alat;
        if ($alat) {
            // Menyimpan kondisi baru ke alat setelah pemeliharaan
            $alat->kondisi = $this->record->kondisi;
            $alat->save();
        }
    }
}
