<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaan';

    protected $fillable = [
        'alat_id',
        'tanggal',
        'uraian_pemeliharaan',
        'kondisi',
    ];

    /**
     * Relasi ke model Alat
     */
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id', 'alat_id');
    }
}
