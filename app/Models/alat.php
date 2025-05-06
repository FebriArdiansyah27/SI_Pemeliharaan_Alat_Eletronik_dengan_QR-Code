<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat extends Model
{
    use HasFactory;

    // Menentukan primary key manual
    protected $primaryKey = 'alat_id';

    // Karena alat_id bukan auto-increment
    public $incrementing = false;

    // Karena alat_id bertipe char/string, bukan int
    protected $keyType = 'string';

    // Nama tabel (opsional kalau sudah sesuai konvensi)
    protected $table = 'alats';

    // Field yang boleh diisi mass-assignment (termasuk alat_id)
    protected $fillable = [
        'alat_id',
        'nama_alat',
        'lokasi',
        'kondisi',
    ];

    // Removed kondisiAlat relationship as 'kondisi_alat_id' column does not exist
    // public function kondisiAlat()
    // {
    //     return $this->belongsTo(KondisiAlat::class, 'kondisi_alat_id');
    // }

    // Relasi banyak pemeliharaan
    public function pemeliharaans()
        {
            return $this->hasMany(Pemeliharaan::class, 'alat_id');
        }


}
