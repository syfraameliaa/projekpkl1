<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faskes;

class FaskesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jenis' => 'rs', 'nama_faskes' => 'RSUD Dr. Soekardjo'],
            ['jenis' => 'rs', 'nama_faskes' => 'RS Jasa Raharja Tasikmalaya'],
            ['jenis' => 'puskesmas', 'nama_faskes' => 'Puskesmas Cihideung'],
            ['jenis' => 'puskesmas', 'nama_faskes' => 'Puskesmas Tawang'],
        ];

        foreach ($data as $item) {
            Faskes::firstOrCreate(
                ['nama_faskes' => $item['nama_faskes']],
                ['jenis' => $item['jenis']]
            );
        }
    }
}
