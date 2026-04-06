<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/bs.min.css">
    <title>Faskes Tersedia</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img src="/img/logojr.png" alt="Logo Jasa Raharja" style="width: 75px; height: 50px;">
            <h4 class="text-light mb-0 ms-3">Selamat Datang</h4>
        </div>
    </nav>

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

<div>
      <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
          <div class="row">
             <div class="col-md-3 mb-4">
              <h5 class="fw-bold">Jasa Raharja PT</h5>
              <address class="small">
                Jl. Mohamad Hatta No.188a, Sukamanah, Kec. Cipedes, Kab. Tasikmalaya, Jawa Barat 46131<br>
                <a href="tel:+628123456789" class="text-light d-block">(0265)332156</a>
                <a href="https://www.jasaraharja.co.id/" class="text-light d-block">jasaraharja.co.id</a>
              </address>
            </div>
           <div class="col-md-3 mb-4">
            <h5 class="fw-bold">Lokasi</h5>
            <div class="ratio ratio-4x3 rounded overflow-hidden shadow-sm">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15829.364632844374!2d108.2163995035028!3d-7.315519028018251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f50acec488d41%3A0xd72d3225cd6f0cbe!2sJasa%20Raharja.%20PT!5e0!3m2!1sid!2sid!4v1770105812795!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <a href="https://maps.app.goo.gl/J31oSMuqgnFyHZvy9" target="_blank" rel="noopener" class="d-block mt-2 small text-decoration-underline text-light">Buka di Google Maps</a>
          </div>

           <div class="col-md-3 mb-4">
            <h5 class="fw-bold">Media Sosial</h5>
            <ul class="list-unstyled small">
              <li class="mb-2"><a href="https://www.instagram.com/jasaraharja_tasikmalaya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="text-light text-decoration-none"><i class="bi bi-instagram me-2"></i>Instagram</a></li>
              <li class="mb-2"><a href="https://www.facebook.com/p/Jasa-Raharja-Tasikmalaya-100066619491973/" target="_blank" class="text-light text-decoration-none"><i class="bi bi-facebook me-2"></i>Facebook</a></li>
              <li><a href="https://youtube.com/@smkn4tasikmalayamediaoffic704?si=qaFavy6FWr9WJfbz" target="_blank" class="text-light text-decoration-none"><i class="bi bi-youtube me-2"></i>YouTube</a></li>
              <li><a href="https://youtube.com/@smkn4tasikmalayamediaoffic704?si=qaFavy6FWr9WJfbz" target="_blank" class="text-light text-decoration-none"><i class="bi bi-youtube me-2"></i>Tiktok</a></li>
            </ul>
          </div>

          <div class="col-md-3 mb-4">
            <h5 class="fw-bold">Link Lainnya</h5>
            <ul class="list-unstyled small">
              <li><a href="https://kemendikdasmen.go.id/" class="text-light text-decoration-none">Kemdikbud</a></li>
              <li><a href="https://dapo.dikdasmen.kemdikbud.go.id/" class="text-light text-decoration-none">Dapodiknasmen</a></li>
              <li><a href="https://psmk.kemdikbud.go.id/" class="text-light text-decoration-none">PSMK</a></li>
              <li><a href="https://disdik.jabarprov.go.id/" class="text-light text-decoration-none">Disdik Jabar</a></li>
            </ul>
          </div>
        </div>
        </div>

          <div class="border-top border-secondary pt-3 d-flex flex-column flex-md-row justify-content-between align-items-center small">
            <p class="mb-2 mb-md-0">&copy; 2026 Syafira Amelia · Semua hak cipta dilindungi.</p>
            <div>
            </div>
          </div>
        </div>
      </footer>
</div>

</body>
</html>
