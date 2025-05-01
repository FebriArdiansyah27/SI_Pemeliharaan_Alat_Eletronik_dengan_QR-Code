<?php

namespace App\Filament\Resources\PemeliharaanResource\Pages;

use App\Filament\Resources\PemeliharaanResource;
use App\Models\Alat;
use Filament\Resources\Pages\CreateRecord;

class CreatePemeliharaan extends CreateRecord
{
    protected static string $resource = PemeliharaanResource::class;

    /**
     * Ubah kondisi alat setelah data pemeliharaan dibuat
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Update kondisi pada tabel alat berdasarkan pemeliharaan
        $alat = Alat::where('alat_id', $data['alat_id'])->first();
        if ($alat) {
            $alat->kondisi = $data['kondisi'];
            $alat->save();
        }

        return $data;
    }
}
