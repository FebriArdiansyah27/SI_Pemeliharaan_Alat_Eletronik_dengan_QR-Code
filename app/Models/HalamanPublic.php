<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HalamanPublic extends Model
{
    use HasFactory;

    protected $primaryKey = 'halaman_id';

    protected $fillable = ['alat_id', 'url_qrcode'];

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
        // Pastikan relasi pakai foreignKey dan ownerKey yang benar
        return $this->belongsTo(Alat::class, 'alat_id', 'alat_id');
    }
}
