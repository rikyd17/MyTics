<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran - {{ $event->title ?? 'Event' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: linear-gradient(180deg, #070d1e 0%, #0a1931 100%);
      color: #f8fafc;
      font-family: 'Inter', sans-serif;
      padding-top: 75px;
      min-height: 100vh;
    }

    .navbar {
      background-color: rgba(7, 13, 30, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 0.75rem 2rem;
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 1000;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
      border-bottom: 1px solid rgba(16, 185, 129, 0.15);
      transition: all 0.3s ease;
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
      transition: all 0.2s ease;
    }

    .nav-link:hover {
      color: #10b981 !important;
      transform: translateY(-1px);
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
      transition: all 0.5s ease;
    }

    .event-img.move-left {
      width: 25%;
      margin-right: 2rem;
      float: left;
    }

    .btn-buy {
      background: linear-gradient(135deg, #059669, #10b981);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 8px;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.35);
      transition: all 0.25s ease;
    }

    .btn-buy:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
      color: white;
    }

    .form-control {
      background-color: rgba(255,255,255,0.05);
      border: 1px solid rgba(255,255,255,0.12);
      color: white;
      border-radius: 8px;
      padding: 0.65rem 1rem;
    }

    .form-control:focus {
      background-color: rgba(255,255,255,0.09);
      color: white;
      border-color: #10b981;
      box-shadow: 0 0 12px rgba(16, 185, 129, 0.35);
    }

    .payment-option {
      background-color: rgba(255,255,255,0.04);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      cursor: pointer;
      transition: all 0.25s ease;
    }

    .payment-option:hover {
      background-color: rgba(16, 185, 129, 0.08);
      border-color: rgba(16, 185, 129, 0.3);
    }

    .payment-option.selected {
      background-color: rgba(16, 185, 129, 0.15);
      border: 1px solid #10b981;
      box-shadow: 0 0 15px rgba(16, 185, 129, 0.25);
    }

    .dana-logo {
      height: 30px;
      margin-right: 10px;
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

    .ticket-card {
      background: linear-gradient(135deg, #0b2545, #081c33);
      border: 1px solid rgba(16, 185, 129, 0.3);
      border-radius: 14px;
      padding: 20px;
      margin-bottom: 20px;
      color: white;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.35);
      position: relative;
      overflow: hidden;
    }

    .ticket-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><text x="10" y="50" font-family="Arial" font-size="15" fill="rgba(255,255,255,0.05)" transform="rotate(45)">EVETICS</text></svg>');
      opacity: 0.3;
    }

    .ticket-header {
      border-bottom: 1px dashed rgba(255, 255, 255, 0.3);
      padding-bottom: 15px;
      margin-bottom: 15px;
    }

    .ticket-qr {
      width: 100px;
      height: 100px;
      background-color: white;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 5px;
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
      @auth
      <div class="d-flex">
        {{-- Tiket Saya --}}
        <a href="{{ route('tickets.index') }}" class="btn btn-outline-light me-2">
          🎟 Tiket Saya
        </a>
        {{-- Nama User + Logout --}}
        <div class="dropdown">
          <button class="btn btn-register dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
      @endauth
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

<!-- Form Pembayaran -->
<div class="container my-5">
  <div class="event-detail-card">
    <div class="d-flex justify-content-center">
     <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="event-img move-left">
    </div>

    <div style="overflow: hidden;">
      <h2>Form Pembelian Tiket</h2>
      <h4>{{ $event->title }}</h4>
      <p><strong>Tanggal & Waktu:</strong> {{ $event->date }}</p>
      <p><strong>Lokasi:</strong> {{ $event->location }}</p>
      <p><strong>Harga Tiket:</strong> Rp {{ number_format($event->price, 0, ',', '.') }}</p>

      <hr>

 <form id="paymentForm" method="POST" action="{{ route('tickets.store', $event->id) }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control" name="phone" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control" name="quantity" min="1" value="1" required>
    </div>

    <div class="mb-4">
        <h5>Metode Pembayaran</h5>
        <div class="payment-option selected">
            <div class="d-flex align-items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="DANA" class="dana-logo">
                <span>DANA</span>
                <input type="hidden" name="payment_method" value="DANA">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ url()->previous() }}" class="btn back-btn">Kembali</a>
        <button type="button" class="btn btn-buy" onclick="processPayment()">Bayar Sekarang</button>
    </div>
</form>

    </div>
  </div>
</div>
<script>
function processPayment() {
    const form = document.getElementById('paymentForm');
    
    // Validasi semua input required
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('is-invalid');
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    if (!isValid) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua field yang diperlukan!',
        });
        return;
    }
    
    // Tampilkan loading
    Swal.fire({
        title: 'Memproses Pembayaran',
        html: 'Sedang memverifikasi pembayaran Anda...',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        },
        willClose: () => {
            // Submit form setelah loading
            form.submit();
        }
    });
}
</script>
</body>
</html>