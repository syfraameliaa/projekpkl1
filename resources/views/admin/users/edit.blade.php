<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/bs.min.css">
<title>Edit User</title>
<style>
body{
    font-family: "Times New Roman", serif;
    background:#f0f2f5;
    padding:40px;
}

.document{
    background:white;
    max-width:800px;
    margin:auto;
    padding:40px;
    box-shadow:0 0 15px rgba(0,0,0,0.1);
    border-radius:8px;
}

h2{
    text-align:center;
    margin-bottom:30px;
    color: #1e3a8a;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #374151;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.btn-submit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    width: 100%;
}

.btn-submit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
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

.alert {
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid transparent;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.password-note {
    font-size: 12px;
    color: #6b7280;
    margin-top: 5px;
    font-style: italic;
}
</style>
</head>
<body>
<x-navbar />
<div class="wrapper">
    <div class="top-bar">
        <a href="{{ route('users.index') }}" class="btn-kembali">← Kembali ke Daftar User</a>
    </div>
</div>

<div class="document">
    <h2>EDIT USER</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" id="password" name="password">
            <div class="password-note">Minimal 8 karakter jika diisi</div>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="form-group">
            <label for="usertype">Tipe User</label>
            <select id="usertype" name="usertype" required>
                <option value="">-- Pilih Tipe User --</option>
                <option value="admin" {{ old('usertype', $user->usertype) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="rs" {{ old('usertype', $user->usertype) == 'rs' ? 'selected' : '' }}>Rumah Sakit</option>
                <option value="puskes" {{ old('usertype', $user->usertype) == 'puskes' ? 'selected' : '' }}>Puskesmas</option>
                <option value="jr" {{ old('usertype', $user->usertype) == 'jr' ? 'selected' : '' }}>Jasa Raharja</option>
            </select>
        </div>

        <div class="form-group">
            <label for="faskes_id">Faskes</label>
            <select id="faskes_id" name="faskes_id" required>
                <option value="">-- Pilih Faskes --</option>
                @foreach($faskes as $f)
                    <option value="{{ $f->id }}" {{ old('faskes_id', $user->faskes_id) == $f->id ? 'selected' : '' }}>
                        {{ $f->jenis }} - {{ $f->nama_faskes }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">Update User</button>
    </form>
</div>

<x-footer />

</body>
</html>
