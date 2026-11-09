<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
      color: #f8fafc;
      font-family: 'Inter', sans-serif;
      padding-top: 75px;
      min-height: 100vh;
    }

    .event-detail-card {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 16px;
      padding: 1.8rem;
      box-shadow: 0 15px 35px rgba(0,0,0,0.35);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .event-img {
      border-radius: 12px;
      margin-bottom: 1.2rem;
      width: 35%;
      box-shadow: 0 8px 20px rgba(0,0,0,0.35);
    }

    .btn-buy {
      background: linear-gradient(135deg, #059669, #10b981);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      padding: 0.5rem 1.2rem;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.35);
      transition: all 0.25s ease;
    }

    .btn-buy:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
      color: white;
    }

    .navbar {
      background-color: rgba(7, 13, 30, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 0.75rem 2rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      border-bottom: 1px solid rgba(16, 185, 129, 0.15);
      transition: all 0.3s ease;
    }

    .navbar.scrolled {
      background-color: rgba(5, 10, 24, 0.95) !important;
      box-shadow: 0 4px 25px rgba(0, 0, 0, 0.6);
    }

    .navbar-brand {
      font-weight: 700;
      letter-spacing: 0.5px;
      background: linear-gradient(135deg, #10b981, #06b6d4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .nav-link {
      color: rgba(241, 245, 249, 0.85) !important;
      font-weight: 500;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      transition: all 0.2s ease;
    }

    .nav-link:hover, .nav-link.active {
      color: #10b981 !important;
      transform: translateY(-1px);
    }

    .btn-login {
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #f1f5f9;
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 8px;
      padding: 0.4rem 1.2rem;
      transition: all 0.2s ease;
    }

    .btn-login:hover {
      background-color: rgba(16, 185, 129, 0.15);
      border-color: #10b981;
      color: #34d399;
      transform: translateY(-1px);
    }

    .btn-register {
      background: linear-gradient(135deg, #059669, #10b981);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
      transition: all 0.2s ease;
    }

    .btn-register:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
    }
    
    .back-btn {
      background-color: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #f1f5f9;
      border-radius: 8px;
      margin-right: 10px;
      transition: all 0.2s ease;
    }

    .back-btn:hover {
      background-color: rgba(16, 185, 129, 0.15);
      border-color: #10b981;
      color: #34d399;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <div class="d-flex">
      <a class="navbar-brand me-4" href="./">MyTics</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="./beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./helpcenter">Help Center</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="d-flex">
       @guest
      <a href="/login" class="btn btn-login me-2">Login</a>
      @endguest

      @auth
     {{-- Ikon Tiket --}}
    <div class="dropdown">
    <a href="{{ route('tickets.index') }}" class="btn btn-outline-light me-2">
  🎟 Tiket Saya
</a>
  </div>
        <div class="dropdown">
        <button class="btn btn-register dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-login me-2">Logout</button>
        </form>
        </li>
        </ul>
        </div>
        @endauth
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- Konten -->
<div class="container my-5">
  <div class="event-detail-card text-center">
    <div class="d-flex justify-content-center">
      <img src="{{ asset('images/5.jpg') }}" alt="Event" class="event-img">
    </div>
    <h1>wWINTER FESTIVAL</h1>
    <p><strong>Tanggal & Waktu:</strong> 10-12 DESEMBER • 11:00 WIB</p>
    <p><strong>Lokasi:</strong> Kebun Buah dan Sayur</p>
    <p><strong>Deskripsi:</strong> Menikmati Indahnya Kawah Putih yang seperti salju di sebuah daerah yang ada di Bandung</p>
    <p><strong>Harga Tiket:</strong> Rp 150.000</p>
    <a href="./beranda" class="btn back-btn">Kembali</a>
    <a href="/event/5/buy" class="btn btn-buy">Beli Tiket</a>
  </div>
</div>

</body>
</html>
