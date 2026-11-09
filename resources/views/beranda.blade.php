<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyTics - Platform Tiket Event Terbaik</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
      color: #f8fafc;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 70px; /* Untuk mengkompensasi navbar fixed */
    }
    
    /* Glassmorphism Navbar */
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
    
    /* Efek saat scroll */
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
      color: #ffffff;
      font-weight: 600;
      border-radius: 8px;
      box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
      transition: all 0.2s ease;
    }
    
    .btn-register:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      color: #ffffff;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
    }
    
    /* Event Cards Styling */
    .event-container {
      padding: 3rem 0;
    }
    
    .event-card {
      background: rgba(255, 255, 255, 0.03);
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.3s ease;
      margin-bottom: 2rem;
      height: 100%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
      border: 1px solid rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(8px);
    }
    
    .event-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(6, 182, 212, 0.22);
      background-color: rgba(255, 255, 255, 0.06);
      border-color: rgba(16, 185, 129, 0.4);
    }
    
    .event-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    
    .event-card:hover .event-img {
      transform: scale(1.04);
    }
    
    .event-body {
      padding: 1.5rem;
    }
    
    .event-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      margin-bottom: 0.5rem;
      color: #ffffff;
    }
    
    .event-date {
      color: #94a3b8;
      margin-bottom: 1rem;
      font-size: 0.875rem;
    }
    
    .event-price {
      font-weight: 700;
      font-size: 1.25rem;
      margin-bottom: 1.4rem;
      color: #34d399; /* Emerald Mint Glow */
      text-shadow: 0 0 15px rgba(52, 211, 153, 0.35);
    }
    
    .event-buttons {
      display: flex;
      gap: 10px;
    }
    
    .btn-detail {
      background-color: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #f1f5f9;
      border-radius: 8px;
      flex: 1;
      transition: all 0.2s ease;
    }
    
    .btn-detail:hover {
      background-color: rgba(16, 185, 129, 0.15);
      border-color: #10b981;
      color: #34d399;
      transform: translateY(-2px);
    }
    
    .btn-buy {
      background: linear-gradient(135deg, #059669, #10b981);
      border: none;
      color: #ffffff;
      font-weight: 600;
      border-radius: 8px;
      flex: 1;
      box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
      transition: all 0.2s ease;
    }
    
    .btn-buy:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
      color: #ffffff;
    }

    /* Dark Dropdown Menu */
    .dropdown-menu {
      background-color: rgba(8, 17, 39, 0.95);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(16, 185, 129, 0.2);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 0.5rem;
    }

    .dropdown-item {
      color: #f1f5f9;
      border-radius: 6px;
    }

    .dropdown-item:hover {
      background-color: rgba(16, 185, 129, 0.15);
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
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Event Cards Section -->
  <section class="event-container">
    <div class="container">
      <div class="row">
        <!-- Event 1 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <img src="{{ asset('images/1.jpg') }}" alt="Pameran dan Pemasaran Buah dan Sayur" class="event-img">
            <div class="event-body">
              <h3 class="event-title">FARMER MARKET</h3>
              <p class="event-date">20-23 FEBRUARI • 06:00 WIB</p>
              <p class="event-price">Rp 20.000</p>
              <div class="event-buttons">
                <a href="./info1" class="btn btn-detail">Lihat Detail</a>
                <a href="./event/1/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Event 2 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <img src="{{ asset('images/2.jpg') }}" alt="Pameran Seni" class="event-img">
            <div class="event-body">
              <h3 class="event-title">Pameran Seni Nasional</h3>
              <p class="event-date">20 April 2023 • 10:00 WIB</p>
              <p class="event-price">Rp 150.000</p>
              <div class="event-buttons">
                <a href="./info2" class="btn btn-detail">Lihat Detail</a>
                <a href="/event/2/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Event 3 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <img src="{{ asset('images/3.jpg') }}" alt="TECH EVENT" class="event-img">
            <div class="event-body">
              <h3 class="event-title">TECHNOLOGY EVENT</h3>
              <p class="event-date">19 OKTOBER 2025 • 08:00 WIB</p>
              <p class="event-price">Rp 100.000</p>
              <div class="event-buttons">
                <a href="./info3" class="btn btn-detail">Lihat Detail</a>
                <a href="/event/3/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Event 4 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <img src="{{ asset('images/4.jpg') }}" alt="BIKE CLUB" class="event-img">
            <div class="event-body">
              <h3 class="event-title">RUN AND FUN</h3>
              <p class="event-date">24 April 2025 • 07:00 WIB</p>
              <p class="event-price"> Rp 30.000</p>
              <div class="event-buttons">
                <a href="./info4" class="btn btn-detail">Lihat Detail</a>
                <a href="/event/4/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Event 5 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
         <img src="{{ asset('images/5.jpg') }}" alt="WINTER FESTIVAL" class="event-img">
            <div class="event-body">
              <h3 class="event-title">WINTER FESTIVAL at BANDUNG</h3>
              <p class="event-date">10-12 DESEMBER 2025 • 11:00 WIB</p>
              <p class="event-price">Rp 150.000</p>
              <div class="event-buttons">
                <a href="./info5" class="btn btn-detail">Lihat Detail</a>
                <a href="/event/5/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Event 6 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <img src="{{ asset('images/6.jpg') }}" alt="Pameran Seni" class="event-img">
            <div class="event-body">
              <h3 class="event-title">Pameran Seni Indonesia</h3>
              <p class="event-date">16 November 2025 • 07:00-15:00 WIB</p>
              <p class="event-price">Rp 25.000</p>
              <div class="event-buttons">
                <a href="./info6" class="btn btn-detail">Lihat Detail</a>
                <a href="/event/6/buy" class="btn btn-buy">Beli Tiket</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Script untuk efek scroll navbar -->
  <script>
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

  </script>
</body>
</html>