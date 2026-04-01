<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bs.min.css">
    <style>
  body {
    background: url('/img/bg.jpg') no-repeat center center/cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    position: relative;
}

/* overlay biar teks ga tenggelam */
body::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.3); /* atur gelapnya di sini */
    z-index: 0;
}

/* card transparan */
.card-custom {
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 30px;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 420px;
    border: 1px solid rgba(255,255,255,0.3);
}

/* judul */
h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #1e3a8a;
    font-weight: 700;
}

/* label */
label {
    color: #1e40af;
    font-weight: 500;
}

/* input */
.form-control {
    border-radius: 10px;
    border: 1px solid #bfdbfe;
    padding: 10px;
    background: rgba(255,255,255,0.85);
}

/* focus */
.form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 0.2rem rgba(59,130,246,0.25);
}

/* tombol */
.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    border: none;
    border-radius: 10px;
    padding: 8px 20px;
}

.btn-primary:hover {
    box-shadow: 0 5px 15px rgba(59,130,246,0.4);
}

/* tombol kembali */
.btn-secondary {
    border-radius: 10px;
    padding: 8px 20px;
}

/* tombol layout */
.btn-group {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}
</style>
    <title>Tambahkan Faskes</title> 
</head>
<body>
<div class="container">
    <div class="card-custom">
        <h2>Tambah Data Faskes</h2>

        <form action="/addfaskes" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Faskes</label>
                <input type="text" name="nama_faskes" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jenis Faskes</label>
                <select name="jenis" class="form-control">
                    <option value="rs">rs</option>
                    <option value="puskesmas">puskesmas</option>
                </select>
            </div>

            <div class="btn-group">
                <a href="" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>