<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bs.min.css">
    <title>Faskes Tersedia</title>
</head>
<body>

    <x-navbar />

<div class="wrapper">
    <div class="top-bar">
        <a href="/halrs/wlrs" class="btn-kembali">← Kembali</a>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3">Pilih Faskes</h3>

            @if($faskes->isEmpty())
                <div class="alert alert-warning mb-0">
                    Data faskes belum ditemukan.
                </div>
            @else
                <div class="list-group">
                    @foreach($faskes as $item)
                        <a href="/halrs/haldatapasien/{{ $item->id }}" class="list-group-item list-group-item-action">
                            {{ $item->jenis == 'rs' ? 'Rumah Sakit' : ($item->jenis == 'puskesmas' ? 'Puskesmas' : $item->jenis) }} - {{ $item->nama_faskes }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<x-footer />

</body>
</html>
