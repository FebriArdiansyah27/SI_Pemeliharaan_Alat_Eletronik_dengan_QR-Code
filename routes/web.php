<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicAlatController;

Route::get('/', [PublicAlatController::class, 'index']);

Route::get('/informasi-pemeliharaan-alat/{alat_id}', [PublicAlatController::class, 'show']);
