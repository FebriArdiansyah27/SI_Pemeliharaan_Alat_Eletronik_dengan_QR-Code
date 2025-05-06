<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Resources\AlatResource\Pages\PrintAlatPdf;
use App\Filament\Resources\HalamanPublicResource\Pages\PrintQrCode;
use App\Http\Controllers\PublicAlatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/informasi-pemeliharaan-alat/{alat_id}', [PublicAlatController::class, 'show']);

Route::get('/cetak-alat/{alat_id}', [PublicAlatController::class, 'print'])->name('cetak-alat.print');

Route::get('/cetak-semua-alat', [PublicAlatController::class, 'printAll'])->name('cetak-semua-alat.printAll');

use App\Models\HalamanPublic;

Route::get('/cetak-pemeliharaan/{pemeliharaan_id}', [\App\Http\Controllers\PublicAlatController::class, 'printPemeliharaan'])->name('cetak-pemeliharaan.print');

Route::get('/cetak-pemeliharaan/{pemeliharaan_id}/pdf', [\App\Http\Controllers\PublicAlatController::class, 'downloadPemeliharaanPdf'])->name('cetak-pemeliharaan.downloadPdf');

Route::get('/cetak-semua-pemeliharaan', [\App\Http\Controllers\PublicAlatController::class, 'printAllPemeliharaan'])->name('cetak-semua-pemeliharaan.printAll');

Route::get('/cetak-semua-pemeliharaan/pdf', [\App\Http\Controllers\PublicAlatController::class, 'downloadAllPemeliharaanPdf'])->name('cetak-semua-pemeliharaan.downloadPdf');

Route::get('/cetak-alat/{alat_id}/pdf', [\App\Http\Controllers\PublicAlatController::class, 'downloadAlatPdf'])->name('cetak-alat.downloadPdf');

Route::get('/cetak-semua-alat/pdf', [\App\Http\Controllers\PublicAlatController::class, 'downloadAllAlatPdf'])->name('cetak-semua-alat.downloadPdf');

Route::get('/print-all-alat', [PublicAlatController::class, 'printAll'])->name('print.all.alat');
