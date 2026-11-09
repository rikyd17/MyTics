<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> MyTics - Platform Tiket Event Terbaik</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                  url('https://images.unsplash.com/photo-1501281668745-f7f57925c3b4');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 70px;
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
    
    .hero-section {
      padding: 8rem 0;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    
    .hero-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      margin-bottom: 1.5rem;
      font-size: 4rem;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
      line-height: 1.2;
    }
    
    .hero-text {
      font-size: 1.3rem;
      opacity: 0.9;
      max-width: 700px;
      margin: 0 auto 2rem;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
      line-height: 1.8;
    }
    
    .hero-footer {
      margin-top: auto;
      text-align: center;
      padding: 2rem 0;
    }
    
    /* Event Cards Styling */
    .event-container {
      padding: 3rem 0;
    }
    
    .event-card {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      overflow: hidden;
      margin-bottom: 2rem;
      height: 100%;
      position: relative;
    }
    
    .coming-soon-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 2;
    }
    
    .coming-soon-text {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: bold;
      color: white;
      transform: rotate(-15deg);
    }
    
    .event-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      background-color: #6f42c1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 5rem;
      color: white;
    }
    
    .question-mark {
      font-size: 5rem;
      font-weight: bold;
    }
    
    .event-body {
      padding: 1.5rem;
    }
    
    .event-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }
    
    .event-date {
      color: #ddd;
      margin-bottom: 1rem;
      font-size: 0.9rem;
    }
    
    .event-buttons {
      display: flex;
    }
    
    .btn-detail {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      width: 100%;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .btn-detail:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }
    
    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }
      .hero-text {
        font-size: 1.1rem;
      }
      .coming-soon-text {
        font-size: 1.5rem;
      }
      .question-mark {
        font-size: 3rem;
      }
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
              <a class="nav-link" href="./comingsoon">ComingSoon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./helpcenter">Help Center</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="d-flex">
        <a href="/login" class="btn btn-login me-2">Login</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section text-center">
    <div class="container">
      <h1 class="hero-title">Event ini akan segera hadir diwaktu yang akan datang</h1>
      <p class="hero-text">Stay tuned untuk informasi lebih lanjut TERIMAKASIH.</p>
    </div>
  </section>

  <!-- Event Cards Section -->
  <section class="event-container">
    <div class="container">
      <div class="row">
        <!-- Event 1 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <div class="coming-soon-overlay">
              <div class="coming-soon-text">Coming Soon 2026</div>
            </div>
            <div class="event-img">
              <div class="question-mark">?</div>
            </div>
            <div class="event-body">
              <h3 class="event-title">PEENTAS KEBUDAYAAN JAWA BARAT</h3>
              <p class="event-date">15 Juli 2026 • 19:00 WIB</p>
            </div>
          </div>
        </div>
        
        <!-- Event 2 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <div class="coming-soon-overlay">
              <div class="coming-soon-text">Coming Soon 2026</div>
            </div>
            <div class="event-img">
              <div class="question-mark">?</div>
            </div>
            <div class="event-body">
              <h3 class="event-title">Festival Kembang Api</h3>
              <p class="event-date">29 Desember 2026 • 12:00 WIB</p>
            </div>
          </div>
        </div>
        
        <!-- Event 3 -->
        <div class="col-md-4 mb-4">
          <div class="event-card">
            <div class="coming-soon-overlay">
              <div class="coming-soon-text">Coming Soon 2027</div>
            </div>
            <div class="event-img">
              <div class="question-mark">?</div>
            </div>
            <div class="event-body">
              <h3 class="event-title">Perlombaan Karya Seni</h3>
              <p class="event-date">5 Januari 2027 • 08:00 WIB</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Text -->
  <div class="hero-footer">
    <div class="container">
      <p class="hero-description">Bergabunglah dengan komunitas kami dan mulai petualangan event Anda sekarang!</p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JS for event details -->
  <script>
    function showEventDetail(eventName) {
      // Simulasi navigasi ke halaman detail
      console.log(`Mengarahkan ke detail event: ${eventName}`);
      alert(`Detail untuk ${eventName} akan ditampilkan di sini.\n\nIni hanya simulasi - dalam implementasi nyata akan mengarahkan ke halaman detail.`);
      
      // Untuk implementasi nyata, gunakan:
      // window.location.href = `/event-detail?name=${encodeURIComponent(eventName)}`;
    }
  </script>
</body>
</html>