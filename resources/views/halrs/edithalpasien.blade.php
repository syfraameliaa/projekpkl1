<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/bs.min.css">
<title>Edit Data Pasien</title>

<style>

body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to right, #e3f2fd, #bbdefb);
    margin: 20px;
}

h2 {
    text-align: center;
    color: #0d47a1;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-size: 13px;
}

th, td {
    border: 1px solid #90caf9;
    padding: 8px;
}

th {
    background: #1976d2;
    color: white;
}

.edit-btn {
    background: #1565c0;
    color: white;
    padding: 6px 10px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.form-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: none;
}

label {
    font-weight: bold;
    color: #0d47a1;
}

input {
    width: 100%;
    padding: 7px;
    border: 1px solid #90caf9;
    border-radius: 6px;
    margin-bottom: 10px;
}

.save-btn {
    background: #0d47a1;
    color: white;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 6px;
}

</style>
</head>

<body>

<a href="/halrs/haldatapasien" class="btn-kembali">← Kembali</a>

<h2>Data Pasien</h2>

<table id="dataTable">

<thead>
<tr>
<th>Nama</th>
<th>Alamat</th>
<th>Tanggal Kejadian</th>
<th>Tempat</th>
<th>Rumah Sakit</th>
<th>Tanggal Masuk</th>
<th>Tanggal Keluar</th>
<th>Diagnosa</th>
<th>Biaya</th>
<th>Tanggal Kontrol</th>
<th>Kontrol Ke</th>
<th>Uang Keluar</th>
<th>Obat</th>
<th>Sisa Asuransi</th>
<th>Dokter</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $d)

<tr>

<td>{{ $d->nama_pasien }}</td>
<td>{{ $d->alamat }}</td>
<td>{{ $d->tanggal_kejadian }}</td>
<td>{{ $d->tempat_kejadian }}</td>
<td>{{ $d->faskes->nama_faskes }}</td>
<td>{{ $d->tanggal_masuk }}</td>
<td>{{ $d->tanggal_keluar }}</td>
<td>{{ $d->diagnosa }}</td>
<td>{{ $d->biaya }}</td>
<td>{{ $d->tanggal_kontrol }}</td>
<td>{{ $d->kontrol_ke }}</td>
<td>{{ $d->uang_keluar }}</td>
<td>{{ $d->obat }}</td>
<td>{{ $d->sisa_asuransi }}</td>
<td>{{ $d->dokter }}</td>

<td>
<button class="edit-btn" onclick="editRow(this,{{ $d->id }})">Edit</button>
</td>

</tr>

@endforeach

</tbody>
</table>


<div class="form-container" id="editForm">

<h3>Edit Kontrol Pasien</h3>

<form method="POST" action="/updatepasien">

@csrf

<input type="hidden" name="id" id="id_pasien">

<label>Tanggal Kontrol</label>
<input type="date" name="tanggal_kontrol" id="tanggal_kontrol">

<label>Kontrol Ke</label>
<input type="number" name="kontrol_ke" id="kontrol_ke">

<label>Uang Keluar</label>
<input type="number" name="uang_keluar" id="uang_keluar">

<label>Obat</label>
<input type="text" name="obat" id="obat">

<label>Sisa Asuransi</label>
<input type="number" name="sisa_asuransi" id="sisa_asuransi">

<label>Dokter</label>
<input type="text" name="dokter" id="dokter">

<button type="submit" class="save-btn">Simpan</button>

</form>

</div>


<script>

function editRow(button,id){

let row = button.closest("tr")
let cells = row.querySelectorAll("td")

document.getElementById("id_pasien").value = id
document.getElementById("tanggal_kontrol").value = cells[9].innerText
document.getElementById("kontrol_ke").value = cells[10].innerText
document.getElementById("uang_keluar").value = cells[11].innerText
document.getElementById("obat").value = cells[12].innerText
document.getElementById("sisa_asuransi").value = cells[13].innerText
document.getElementById("dokter").value = cells[14].innerText

document.getElementById("editForm").style.display="block"

}

</script>

</body>
</html>