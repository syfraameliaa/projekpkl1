<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
           $table->date('tanggal_masuk');
$table->date('tanggal_kejadian');
$table->string('nama_pasien');
$table->string('alamat');
$table->string('tempat_kejadian');
$table->string('diagnosa');

$table->unsignedBigInteger('faskes_id'); // relasi ke tabel faskes

$table->date('tanggal_keluar');
$table->integer('biaya');
$table->string('keterangan');
$table->date('tanggal_kontrol')->nullable();
$table->integer('kontrol_ke')->nullable();
$table->integer('uang_keluar')->nullable();
$table->string('obat')->nullable();
$table->integer('sisa_asuransi')->nullable();
$table->string('dokter')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
