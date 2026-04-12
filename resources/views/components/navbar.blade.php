<div>
    <!-- nav -->
   <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <img src="/img/logojr.png" alt="Logo Jasa Raharja" style="width: 75px; height: 50px;">
            <h4 class="text-light mb-0 ms-3">Selamat Datang</h4>
        </div>
        @auth
        <form action="/logout" method="POST" class="d-flex align-items-center">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
        @endauth
      </div>
</nav>
<!-- tutup nav -->
</div>