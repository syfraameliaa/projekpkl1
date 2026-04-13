<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bs.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <x-navbar />

    <!-- logout/login/register -->
<h1>Dashboard Admin</h1>
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@else
<p>You are logged in</p>
@endif

<!-- tutup llr -->
<div class="wrapper">
    <div class="top-bar">
        <a href="/haljr/halJR" class="btn-kembali">Hal JR</a>
    </div>
</div>
<div class="wrapper">
    <div class="top-bar">
        <a href="/halrs/wlrs" class="btn-kembali">Hal RS</a>
    </div>
</div>
<div class="container">
    <div class="d-grid gap-3 my-2">
        <a href="/halrs/formpasien" class="btn btn-outline-light" style="width:1000px; height:125px;"><h3 class="my-4"> Tambah Pasien Dan Lihat Pasien</h3></a>
        <a href="/halrs/haldatapasien" class="btn btn-outline-light" style="width:1000px; height:125px;"><h3 class="my-4"> Lihat Data Data Pasien</h3></a>
        <a href="/addfaskes" class="btn btn-outline-light" style="width:1000px; height:125px;"><h3 class="my-4"> Tambahkan Faskes</h3></a>
</div>
</div>

    <x-footer />
</body>
</html>
