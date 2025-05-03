<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HalamanPublic extends Model
{
    use HasFactory;

    protected $primaryKey = 'halaman_id';

    protected $fillable = ['alat_id', 'url_qrcode', 'qr_code'];

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id', 'alat_id');
    }

    public function generateQrCode()
    {
        if (!$this->url_qrcode && $this->alat_id) {
            $this->url_qrcode = url('/informasi-pemeliharaan-alat/' . $this->alat_id);
        }

        if ($this->url_qrcode) {
            $filename = 'qr-codes/' . $this->alat_id . '.svg';

            // Simpan QR Code SVG ke storage/public/qr-codes
            Storage::disk('public')->put(
                $filename,
                QrCode::format('svg')->size(200)->generate($this->url_qrcode)
            );

            $this->qr_code = $filename;
            $this->save();
        }
    }

    public function getQrCodeUrlAttribute()
    {
        return $this->qr_code ? asset('storage/' . $this->qr_code) : null;
    }
}
