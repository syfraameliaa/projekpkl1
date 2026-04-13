<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Pengisian Data Korban</title>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/bs.min.css">

</head>

<body>

<x-navbar />
<div class="wrapper">
    <div class="top-bar">
        <a href="/halrs/wlrs" class="btn-kembali">← Kembali</a>
    </div>
</div>
<!-- FORM -->
<div class="container">
    <div class="form-card">

        <div class="form-title">
            Form Pengisian Data Korban
        </div>
<form action="/pasien/store" method="POST">
@csrf

<label>Nama</label>
<input type="text" name="nama_pasien">

<label>Alamat</label>
<input type="text" name="alamat">

<label>Tanggal Kejadian</label>
<input type="date" name="tanggal_kejadian">

<label>Tempat Kejadian</label>
<input type="text" name="tempat_kejadian">

<label>Diagnosa</label>
<input type="text" name="diagnosa">

<label>Tanggal Masuk</label>
<input type="date" name="tanggal_masuk">

<label>Tanggal Keluar</label>
<input type="date" name="tanggal_keluar">

<label>Jenis Faskes</label>
<input type="text" value="{{ $faskes->jenis ?? '' }}" readonly>

<label>Nama Faskes</label>
<input type="text" value="{{ $faskes->nama_faskes ?? '' }}" readonly>

<label>Biaya</label>
<input type="number" name="biaya">

<label>Keterangan</label>
<textarea name="keterangan"></textarea>
<br>
<button type="submit" class="btn-submit text-white">Simpan</button>

</form>


</div>
</div>
<!-- tutupform -->

    

<x-footer />

</body>
</html>