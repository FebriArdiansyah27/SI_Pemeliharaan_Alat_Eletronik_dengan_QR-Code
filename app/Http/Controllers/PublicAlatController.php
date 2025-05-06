<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Pemeliharaan;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function print($alat_id)
    {
        $alat = Alat::with('pemeliharaans')->where('alat_id', $alat_id)->first();

        if (!$alat) {
            abort(404, 'Alat tidak ditemukan');
        }

        $qrCode = QrCode::size(120)->generate(url('/informasi-pemeliharaan-alat/' . $alat->alat_id));

        return view('print-alat-qr', compact('alat', 'qrCode'));
    }

    public function printAll()
    {
        $alats = Alat::with('pemeliharaans')->get();

        return view('print-all-alat-qr', compact('alats'));
    }

    public function printPemeliharaan($pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::with('alat')->where('id', $pemeliharaan_id)->first();

        if (!$pemeliharaan) {
            abort(404, 'Data pemeliharaan tidak ditemukan');
        }

        return view('print-pemeliharaan', compact('pemeliharaan'));
    }

    public function printAllPemeliharaan()
    {
        $pemeliharaans = Pemeliharaan::with('alat')->get();

        return view('print-all-pemeliharaan', compact('pemeliharaans'));
    }

    public function downloadPemeliharaanPdf($pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::with('alat')->where('id', $pemeliharaan_id)->first();

        if (!$pemeliharaan) {
            abort(404, 'Data pemeliharaan tidak ditemukan');
        }

        $pdf = Pdf::loadView('print-pemeliharaan', compact('pemeliharaan'));
        return $pdf->download('pemeliharaan-' . $pemeliharaan_id . '.pdf');
    }

    public function downloadAllPemeliharaanPdf()
    {
        $pemeliharaans = Pemeliharaan::with('alat')->get();

        $pdf = Pdf::loadView('print-all-pemeliharaan', compact('pemeliharaans'));
        return $pdf->download('semua-pemeliharaan.pdf');

        // Use the test blade view to debug multiple entries rendering
    }

    public function downloadAlatPdf($alat_id)
    {
        $alat = Alat::with('pemeliharaans')->where('alat_id', $alat_id)->first();

        if (!$alat) {
            abort(404, 'Alat tidak ditemukan');
        }

        // Generate QR code as SVG string (original method)
        $qrCode = QrCode::size(120)->generate(url('/informasi-pemeliharaan-alat/' . $alat->alat_id));

        $pdf = Pdf::loadView('print-alat', compact('alat', 'qrCode'));
        return $pdf->download('alat-' . $alat_id . '.pdf');
    }

    public function downloadAllAlatPdf()
    {
        $alats = Alat::with('pemeliharaans')->get();

        $pdf = Pdf::loadView('print-all-alat', compact('alats'));
        return $pdf->download('semua-alat.pdf');
    }
}
