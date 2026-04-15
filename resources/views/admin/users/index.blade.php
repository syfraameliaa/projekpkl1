<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/bs.min.css">
<title>Kelola Users</title>
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
    margin-right: 10px;
}

/* Hover effect */
.edit-btn:hover {
    background: linear-gradient(135deg, #0d47a1, #08306b);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #ffffff;
}

/* Tombol Tambah */
.add-btn {
    background: linear-gradient(135deg, #2e7d32, #1b5e20);
    color: #ffffff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.add-btn:hover {
    background: linear-gradient(135deg, #1b5e20, #0d3d0f);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #ffffff;
}

/* Tombol Hapus */
.delete-btn {
    background: linear-gradient(135deg, #d32f2f, #b71c1c);
    color: #ffffff;
    padding: 8px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.delete-btn:hover {
    background: linear-gradient(135deg, #b71c1c, #8b0000);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #ffffff;
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

table{
    width:100%;
    border-collapse:collapse;
    font-size:13px;
}

th, td{
    border:1px solid black;
    padding:8px;
    text-align:left;
}

th{
    background:#e6f0ff;
    text-align:center;
    font-weight: bold;
}

.action-buttons {
    text-align: center;
    white-space: nowrap;
}

.alert {
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid transparent;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.btn-kembali {
    background: linear-gradient(135deg, #6c757d, #495057);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.btn-kembali:hover {
    background: linear-gradient(135deg, #495057, #343a40);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
    text-decoration: none;
    color: white;
}
</style>
</head>
<body>
<x-navbar />
<div class="wrapper">
    <div class="top-bar">
        <a href="/admin/dashboard" class="btn-kembali">← Kembali ke Dashboard</a>
    </div>
</div>

<div class="document">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="controls">
        <a href="{{ route('users.create') }}" class="add-btn">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>

    <h2>DAFTAR PENGGUNA</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tipe User</th>
                <th>Faskes</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @switch($user->usertype)
                            @case('admin')
                                <span class="badge bg-danger">Admin</span>
                                @break
                            @case('rs')
                                <span class="badge bg-primary">Rumah Sakit</span>
                                @break
                            @case('puskes')
                                <span class="badge bg-success">Puskesmas</span>
                                @break
                            @case('jr')
                                <span class="badge bg-warning">Jasa Raharja</span>
                                @break
                        @endswitch
                    </td>
                    <td>{{ $user->faskes->nama_faskes ?? '-' }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('users.edit', $user->id) }}" class="edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data user</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<x-footer />

</body>
</html>
