<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiket Saya - MyTics</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <style>
    :root {
      --warna-utama: #10b981;
      --warna-utama-gelap: #059669;
      --warna-neon: #34d399;
      --gradien-latar: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
      --warna-navbar: rgba(7, 13, 30, 0.85);
    }
    
    body {
      background: var(--gradien-latar);
      color: #f8fafc;
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
    }
    
    /* Navbar */
    .navbar {
      background-color: var(--warna-navbar);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 0.75rem 2rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
      border-bottom: 1px solid rgba(16, 185, 129, 0.15);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
    
    .navbar-brand {
      font-weight: 700;
      letter-spacing: 0.5px;
      font-size: 1.3rem;
      display: flex;
      align-items: center;
      background: linear-gradient(135deg, #10b981, #06b6d4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .navbar-brand i {
      margin-right: 8px;
      -webkit-text-fill-color: #10b981;
    }
    
    .nav-link {
      color: rgba(241, 245, 249, 0.85) !important;
      font-weight: 500;
      margin: 0 0.7rem;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
    }
    
    .nav-link:hover, .nav-link.active {
      color: #10b981 !important;
      transform: translateY(-2px);
    }
    
    /* Konten Utama */
    .konten-utama {
      padding-top: 85px;
      padding-bottom: 40px;
      min-height: calc(100vh - 80px);
    }
    
    .container-tiket {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 20px;
    }
    
    .judul-halaman {
      text-align: center;
      margin-bottom: 2rem;
    }
    
    .judul-halaman h2 {
      display: inline-flex;
      align-items: center;
      background: rgba(16, 185, 129, 0.15);
      padding: 10px 25px;
      border-radius: 50px;
      border: 1px solid #10b981;
      box-shadow: 0 0 15px rgba(16, 185, 129, 0.25);
      color: #ffffff;
    }
    
    /* Filter Tiket */
    .filter-tiket {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 25px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
    }
    
    .tombol-filter {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.12);
      color: #f1f5f9;
      padding: 6px 18px;
      border-radius: 20px;
      transition: all 0.25s ease;
      font-size: 0.9rem;
    }
    
    .tombol-filter:hover, .tombol-filter.active {
      background: linear-gradient(135deg, #059669, #10b981);
      border-color: transparent;
      color: #ffffff;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35);
    }
    
    /* Kartu Tiket */
    .kartu-tiket {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.35);
      transition: all 0.3s ease;
      border-left: 4px solid #10b981;
      animation: fadeIn 0.5s ease forwards;
    }
    
    .kartu-tiket:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(6, 182, 212, 0.25);
      border-left-color: #34d399;
    }
    
    .kepala-tiket {
      display: flex;
      padding: 15px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .gambar-tiket {
      width: 120px;
      height: 160px;
      border-radius: 8px;
      object-fit: cover;
      margin-right: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .info-tiket {
      flex: 1;
      position: relative;
    }
    
    .judul-tiket {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 8px;
      color: #fff;
    }
    
    .meta-tiket {
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 5px;
    }
    
    .kaki-tiket {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      background: rgba(0, 0, 0, 0.2);
    }
    
    .status-tiket {
      padding: 6px 15px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }
    
    .status-berhasil {
      background-color: rgba(40, 167, 69, 0.2);
      color: #28a745;
      border: 1px solid #28a745;
    }
    
    .status-pending {
      background-color: rgba(255, 193, 7, 0.2);
      color: #ffc107;
      border: 1px solid #ffc107;
    }
    
    .status-gagal {
      background-color: rgba(220, 53, 69, 0.2);
      color: #dc3545;
      border: 1px solid #dc3545;
    }
    
    /* Responsif */
    @media (max-width: 768px) {
      .kepala-tiket {
        flex-direction: column;
      }
      
      .gambar-tiket {
        width: 100%;
        margin-right: 0;
        margin-bottom: 15px;
      }
    }
    
    /* Animasi */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .tiket-baru {
        border: 2px solid #28a745;
        animation: pulse 2s infinite;
    }
    
    .badge-baru {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #28a745;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }
    
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">MyTics</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/beranda">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="/helpcenter">Help Center</a></li>
      </ul>
      <div class="d-flex">
        @auth
        <div class="dropdown">
          <a href="#" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <a href="/login" class="btn btn-outline-light"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        @endauth
      </div>
    </div>
  </div>
</nav>

@if(session('success'))
<div class="container-tiket">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('error'))
<div class="container-tiket">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- Konten Utama -->
<main class="konten-utama">
  <div class="container-tiket">
   <!-- Debug Section -->
    <div class="alert alert-info d-none">
        <h4>Debug Information</h4>
        <p>Total Tickets: {{ $tickets->count() }}</p>
        @if($tickets->count() > 0)
            <p>Sample Ticket:</p>
            <pre>{{ print_r($tickets->first()->toArray(), true) }}</pre>
        @endif
    </div>
    <div class="judul-halaman">
      <h2><i class="bi bi-ticket-perforated"></i> Daftar Tiket Saya</h2>
    </div>

    @if($tickets->isEmpty())
    <div class="alert alert-warning text-center">
      <i class="bi bi-exclamation-triangle"></i> Anda belum memiliki tiket
      <div class="mt-3">
        <a href="/beranda" class="btn btn-primary"><i class="bi bi-search"></i> Cari Event</a>
      </div>
    </div>
    @else
    <!-- Filter Tiket -->
    <div class="filter-tiket">
      <button class="tombol-filter active" data-filter="semua">Semua</button>
      <button class="tombol-filter" data-filter="success">Berhasil</button>
      <button class="tombol-filter" data-filter="pending">Pending</button>
      <button class="tombol-filter" data-filter="failed">Gagal</button>
    </div>

    <!-- Daftar Tiket -->
    
   @foreach($tickets as $ticket)
  <div @if(session('new_ticket_id') == $ticket->id) tiket-baru @endif" 
     data-status="{{ $ticket->status }}"
     id="tiket-{{ $ticket->id }}">
    @if(session('new_ticket_id') == $ticket->id)
    <div class="badge-baru">BARU</div>
    @endif
    
    <div class="kartu-tiket" data-status="{{ $ticket->status }}">
      <div class="kepala-tiket">
        <img src="{{ asset($ticket->event->image ?? 'img/default.jpg') }}" alt="{{ $ticket->event->name ?? 'Event' }}" class="gambar-tiket">
        <div class="info-tiket">
          <h3 class="judul-tiket">{{ $ticket->event->name ?? '-' }}</h3>
          <div class="meta-tiket">
            <div><i class="bi bi-calendar"></i> 
              {{ \Carbon\Carbon::parse($ticket->event->date ?? now())->translatedFormat('l, d F Y H:i') }}
            </div>
            <div><i class="bi bi-geo-alt"></i> {{ $ticket->event->location ?? '-' }}</div>
            <div><i class="bi bi-cash"></i> Rp {{ number_format($ticket->event->price ?? 0, 0, ',', '.') }} per tiket</div>
          </div>
        </div>
      </div>
      <div class="kaki-tiket">
        <div>
          <i class="bi bi-ticket-detailed"></i> {{ $ticket->quantity }} Tiket (Total: Rp {{ number_format($ticket->total_price, 0, ',', '.') }})
        </div>
        <div>
          <span class="status-tiket status-{{ $ticket->status }}">
            <i class="bi bi-{{ $ticket->status === 'success' ? 'check-circle' : ($ticket->status === 'pending' ? 'clock' : 'x-circle') }}"></i>
            {{ ucfirst($ticket->status) }}
          </span>
          <a href="{{ route('tickets.download', $ticket->id) }}" class="btn btn-sm btn-primary ms-2" target="_blank">
            <i class="bi bi-download"></i> Unduh
          </a>
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Filter Tiket
  document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.shiftKey && e.key === 'D') {
        document.querySelector('.alert.alert-info').classList.toggle('d-none');
    }
});
  document.querySelectorAll('.tombol-filter').forEach(tombol => {
    tombol.addEventListener('click', function () {
      document.querySelectorAll('.tombol-filter').forEach(t => t.classList.remove('active'));
      this.classList.add('active');

      const filter = this.dataset.filter;
      const semuaTiket = document.querySelectorAll('.kartu-tiket');

      semuaTiket.forEach(tiket => {
        tiket.style.display = (filter === 'semua' || tiket.dataset.status === filter) ? 'block' : 'none';
      });
    });
  });

  // Unduh Tiket
  function unduhTiket(idTiket) {
    alert(`Fitur unduh tiket #${idTiket} akan segera tersedia!`);
    // window.location.href = `/tiket/${idTiket}/unduh`;
  }
</script>
</body>
</html>