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
<select id="jenis_faskes">
<option value="">Pilih</option>
<option value="rs">Rumah Sakit</option>
<option value="puskesmas">Puskesmas</option>
</select>

<label>Nama Faskes</label>
<select name="faskes_id" id="nama_faskes">
<option value="">Pilih dulu jenis</option>
</select>

<label>Biaya</label>
<input type="number" name="biaya">

<label>Keterangan</label>
<textarea name="keterangan"></textarea>
<br>
<button type="submit" class="btn-submit text-white">Simpan</button>

</form>

<script>

let semuaFaskes = @json($faskes);

document.getElementById("jenis_faskes").addEventListener("change", function(){

let jenis = this.value;
let dropdown = document.getElementById("nama_faskes");

dropdown.innerHTML = "<option value=''>Pilih Faskes</option>";

semuaFaskes.forEach(function(f){
console.log(f);
if(f.jenis == jenis){
dropdown.innerHTML += `
<option value="${f.id}">${f.nama_faskes}</option>
`;
}

});

});

</script>

</div>
</div>
<!-- tutupform -->

    

<x-footer />

</body>
</html>