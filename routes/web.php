<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Resources\AlatResource\Pages\PrintAlatPdf;


use App\Http\Controllers\PublicAlatController;


Route::get('/informasi-pemeliharaan-alat/{alat_id}', [PublicAlatController::class, 'show']);

Route::get('/cetak-alat/{alat_id}', [PublicAlatController::class, 'print'])->name('cetak-alat.print');


use App\Models\HalamanPublic;

Route::get('/preview-qr/{id}', function ($id) {
    $record = HalamanPublic::findOrFail($id);
    $url = $record->url_qrcode;

    return view('qr.preview', compact('url'));
})->name('qr.preview');
