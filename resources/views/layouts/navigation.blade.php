<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Rumah Sakit</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link{{ request()->is('pasiens') ? ' active' : '' }}" href="/pasien">Pasien</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link{{ request()->is('dokter') ? ' active' : '' }}" href="/dokter">Dokter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('Pemeriksaan') ? ' active' : '' }}" href="/pemeriksaan">Pemeriksaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('Bayar') ? ' active' : '' }}" href="/bayar">Bayar</a>
        </li>
    </div>
  </div>
</nav>