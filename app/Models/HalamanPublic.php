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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($halaman) {
            // Cari alat berdasarkan alat_id (primary key nya alat adalah alat_id, bukan id)
            $alat = Alat::where('alat_id', $halaman->alat_id)->first();
            if ($alat) {
                // Gunakan alat_id, bukan id biasa
                $halaman->url_qrcode = url('/informasi-pemeliharaan-alat/' . $alat->alat_id);
            }
        });
    }

    public function alat()
    {
        // Relasi ke tabel alat, foreign key: alat_id, owner key: alat_id
        return $this->belongsTo(Alat::class, 'alat_id', 'alat_id');
    }

    public function generateQrCode()
    {
        if (!$this->url_qrcode) return;

        $filename = 'qr-codes/' . $this->alat_id . '.svg';

        // Simpan file SVG ke storage/app/public/qr-codes
        Storage::disk('public')->put(
            $filename,
            QrCode::format('svg')->size(200)->generate($this->url_qrcode)
        );

        $this->qr_code = $filename;
        $this->save();
    }

    public function getQrCodeUrlAttribute()
    {
        return $this->qr_code ? asset('storage/' . $this->qr_code) : null;
    }
}
