<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
     protected $fillable = [
        'tanggal_masuk',
        'tanggal_kejadian',
        'nama_pasien',
        'alamat',
        'tempat_kejadian',
        'faskes_id',
        'tanggal_kontrol',
        'diagnosa',
        'tanggal_keluar',
        'biaya',
        'keterangan',
        'kontrol_ke',
        'uang_keluar',
        'obat',
        'sisa_asuransi',
        'dokter'
        ];

        public function faskes()
{
    return $this->belongsTo(Faskes::class);
}
}
