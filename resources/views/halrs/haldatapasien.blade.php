<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/bs.min.css">
<title>Data Pasien</title>
<style>
/* Container tombol */
.controls {
    text-align: right;
    margin-bottom: 20px;
}

/* Style tombol link */
.edit-btn {
    background: linear-gradient(135deg, #1976d2, #0d47a1);
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;   /* HAPUS GARIS */
    font-weight: 600;
    font-size: 14px;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

/* Hover effect */
.edit-btn:hover {
    background: linear-gradient(135deg, #0d47a1, #08306b);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
}

/* Supaya gak balik ada garis pas diklik */
.edit-btn:focus,
.edit-btn:active {
    text-decoration: none;
    outline: none;
}

body{
    font-family: "Times New Roman", serif;
    background:#f0f2f5;
    padding:40px;
}

.document{
    background:white;
    max-width:1200px;
    margin:auto;
    padding:40px;
    box-shadow:0 0 15px rgba(0,0,0,0.1);
    border-radius:8px;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

.controls{
    text-align:right;
    margin-bottom:20px;
}

button{
    padding:6px 12px;
    border:none;
    cursor:pointer;
    border-radius:4px;
    font-size:13px;
}

.edit-btn{
    background:#1565c0;
    color:white;
}

.print-btn{
    background:#2e7d32;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
}

th, td{
    border:1px solid black;
    padding:6px;
    text-align:center;
}

th{
    background:#e6f0ff;
}

/* Mode print */
@media print{
    body *{
        visibility:hidden;
    }
    .print-area, .print-area *{
        visibility:visible;
    }
    .print-area{
        position:absolute;
        left:0;
        top:0;
        width:100%;
    }
}
</style>

<script>
function enableEdit(){
    let table = document.getElementById("dataTable");
    table.contentEditable = true;
    alert("Mode edit aktif. Silakan ubah semua data korban.");
}

function printRow(button){
    let row = button.closest("tr").cloneNode(true);
    row.removeChild(row.lastElementChild); // hapus kolom tombol

    let table = document.createElement("table");
    table.border = "1";
    table.style.borderCollapse = "collapse";
    table.style.width = "100%";
    table.appendChild(document.querySelector("#dataTable thead").cloneNode(true));
    table.querySelector("thead tr").removeChild(table.querySelector("thead tr").lastElementChild);
    table.appendChild(document.createElement("tbody")).appendChild(row);

    let printDiv = document.createElement("div");
    printDiv.classList.add("print-area");
    printDiv.innerHTML = "<h2 style='text-align:center;'>LAPORAN DATA PASIEN</h2><br>";
    printDiv.appendChild(table);

    document.body.appendChild(printDiv);
    window.print();
    document.body.removeChild(printDiv);
}
</script>

</head>
<body>
<div class="wrapper">
    <div class="top-bar">
        <a href="/halrs/wlrs" class="btn-kembali">← Kembali</a>
    </div>
</div>

<div class="document">
    <div class="controls">
    <a href="/halrs/edithalpasien" class="edit-btn">Edit Semua Data</a>
</div>
<h2>{{ $datafaskes->nama_faskes }}</h2>
<h2>LAPORAN DATA PASIEN</h2>


<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal Kejadian</th>
        <th>Tempat</th>
        <th>Nama Faskes</th>
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
    </tr>

    @foreach($data as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_pasien }}</td>
        <td>{{ $item->tanggal_kejadian }}</td>
        <td>{{ $item->tempat_kejadian }}</td>
        <td>{{ $item->faskes->jenis }} - {{ $item->faskes->nama_faskes }}</td>
        <td>{{ $item->tanggal_masuk }}</td>
        <td>{{ $item->tanggal_keluar }}</td>
        <td>{{ $item->diagnosa }}</td>
        <td>{{ $item->biaya }}</td>
        <td>{{ $item->tanggal_kontrol }}</td>
        <td>{{ $item->kontrol_ke }}</td>
        <td>{{ $item->uang_keluar }}</td>
        <td>{{ $item->obat }}</td>
        <td>{{ $item->sisa_asuransi }}</td>
        <td>{{ $item->dokter }}</td>
    </tr>
    @endforeach
</table>
</div>

</body>
</html>