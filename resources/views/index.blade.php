<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Sistem Manajemen Sepatu</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">CIBADUYUT SHOES</a>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        @if(session()->has('user'))
          <span class="text-white me-3">
             Halo, {{ session('user') }}
          </span>
          <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin keluar?')">
            Logout
          </a>
        @else
          <a href="{{ route('login') }}" class="btn btn-warning btn-sm">
            Login
          </a>
        @endif
      </div>

      <div class="d-flex align-items-center ms-auto gap-2 ps-3">
        <button
          class="btn btn-outline-warning btn-sm"
          data-bs-toggle="modal"
          data-bs-target="#wishlistModal">
          ⭐ Wishlist (<span id="wishlist-count">0</span>)
        </button>
        <button
          class="btn btn-outline-success btn-sm"
          data-bs-toggle="modal"
          data-bs-target="#cartModal">
          🛒 Keranjang (<span id="cart-count">0</span>)
        </button>
        <button id="btn-theme" class="btn btn-outline-light btn-sm">
          Mode Gelap
        </button>
      </div>
    </div>
  </nav>

  <div class="hero text-center text-white d-flex align-items-center">
    <div class="container">
      <h1>Sistem Manajemen Sepatu</h1>
      <p>Kelola Data Sepatu Dengan Mudah</p>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row text-center">
      <div class="col-md-4">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5>Total Produk</h5>
            <h2>12</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5>Stok Tersedia</h5>
            <h2>85</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5>Kategori</h5>
            <h2>3</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <h3 class="mb-4">Daftar Sepatu</h3>
    <div class="row" id="container-barang">
      
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{ asset('assets/NIKE_P_6000.jpg') }}" class="card-img-top" alt="Sepatu" />
          <div class="card-body">
            <h5 class="card-title">Nike P-6000</h5>
            <p class="card-text harga-text">Harga: Rp 1.429.000</p>
            <p class="card-text stok-text">Stok: 10</p>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
              <button class="btn btn-outline-danger btn-wishlist w-50">❤ Wishlist</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{ asset('assets/AIR_FORCE_1.jpg') }}" class="card-img-top" alt="Sepatu" />
          <div class="card-body">
            <h5 class="card-title">Nike Air Force 1</h5>
            <p class="card-text harga-text">Harga: Rp 1.259.000</p>
            <p class="card-text stok-text">Stok: 7</p>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
              <button class="btn btn-outline-danger btn-wishlist w-50">❤ Wishlist</button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="{{ asset('assets/AIR_JORDAN_1_LOW.jpg') }}" class="card-img-top" alt="Sepatu" />
          <div class="card-body">
            <h5 class="card-title">Nike Air Jordan 1 Low</h5>
            <p class="card-text harga-text">Harga: Rp 1.729.000</p>
            <p class="card-text stok-text">Stok: 10</p>
            <div class="d-flex justify-content-between">
              <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
              <button class="btn btn-outline-danger btn-wishlist w-50">❤ Wishlist</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white text-center p-3 mt-5">
    &copy; 2026 Sistem Manajemen Sepatu Toko Sepatu.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>