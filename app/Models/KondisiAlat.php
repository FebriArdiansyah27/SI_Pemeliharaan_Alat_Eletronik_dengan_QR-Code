<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KondisiAlat extends Model
{
    use HasFactory;

    protected $table = 'kondisi_alats';

    protected $fillable = [
        'nama_kondisi',
    ];

    public function alats()
    {
        return $this->hasMany(Alat::class, 'kondisi_alat_id');
    }
}
