<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'nama_faskes'
    ];


    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
