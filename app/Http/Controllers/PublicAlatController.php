<?php

namespace App\Http\Controllers;

use App\Models\Alat;

class PublicAlatController extends Controller
{
    public function show($alat_id)
    {
        $alat = Alat::with('pemeliharaans')->where('alat_id', $alat_id)->first();

        if (!$alat) {
            abort(404, 'Alat tidak ditemukan');
        }

        return view('public-informasi-alat', compact('alat'));
    }
}
