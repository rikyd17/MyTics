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
      padding-top: 75px;
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

    .chat-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 75px);
      padding: 20px;
    }

    .chatbox {
      width: 100%;
      max-width: 520px;
      height: 520px;
      border-radius: 18px;
      padding: 24px;
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(16, 185, 129, 0.15);
      box-shadow: 0 20px 45px rgba(0, 0, 0, 0.45);
      display: flex;
      flex-direction: column;
    }

    .chat-header {
      text-align: center;
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .chat-header h4 {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      background: linear-gradient(135deg, #ffffff, #34d399);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin: 0;
    }

    .messages {
      flex: 1;
      overflow-y: auto;
      margin-bottom: 15px;
      padding: 12px;
      background-color: rgba(0, 0, 0, 0.25);
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .message {
      margin: 10px 0;
      padding: 10px 14px;
      border-radius: 10px;
      max-width: 80%;
      word-wrap: break-word;
      font-size: 0.95rem;
    }

    .user {
      background: linear-gradient(135deg, rgba(5, 150, 105, 0.5), rgba(16, 185, 129, 0.5));
      border: 1px solid rgba(16, 185, 129, 0.3);
      color: #ffffff;
      margin-left: auto;
      border-bottom-right-radius: 2px;
    }

    .bot {
      background-color: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.08);
      color: #f1f5f9;
      margin-right: auto;
      border-bottom-left-radius: 2px;
    }

    .chat-input {
      display: flex;
      gap: 10px;
    }

    .chat-input input {
      flex: 1;
      padding: 12px 14px;
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 8px;
      background-color: rgba(255, 255, 255, 0.05);
      color: white;
      font-size: 0.95rem;
      transition: all 0.2s ease;
    }

    .chat-input input:focus {
      outline: none;
      background-color: rgba(255, 255, 255, 0.09);
      border-color: #10b981;
      box-shadow: 0 0 12px rgba(16, 185, 129, 0.35);
    }

    .chat-input button {
      padding: 12px 22px;
      border: none;
      border-radius: 8px;
      background: linear-gradient(135deg, #059669, #10b981);
      color: white;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(16, 185, 129, 0.35);
      transition: all 0.2s ease;
    }

    .chat-input button:hover {
      background: linear-gradient(135deg, #10b981, #34d399);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.55);
    }

    @media (max-width: 576px) {
      .chatbox {
        height: 420px;
        padding: 16px;
      }
      
      .message {
        max-width: 90%;
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

  <!-- Chatbot Container -->
  <div class="chat-container">
    <div class="chatbox">
      <div class="chat-header">
        <h4>BOT-EVE</h4>
        <p>Asisten Virtual MyTics</p>
      </div>
      
      <div class="messages" id="chat">
        <div class="message bot">
          Halo! Saya BOT. Ada yang bisa saya bantu?
        </div>
      </div>
      
      <div class="chat-input">
        <input type="text" id="userInput" placeholder="Tulis pesan Anda..." onkeypress="handleKeyPress(event)">
        <button onclick="sendMessage()">Kirim</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    function handleKeyPress(e) {
      if (e.key === 'Enter') {
        sendMessage();
      }
    }

    function sendMessage() {
      const input = document.getElementById("userInput");
      const message = input.value.trim();
      if (message === "") return;

      appendMessage("user", message);
      input.value = "";

      const response = getBotResponse(message);
      setTimeout(() => {
        appendMessage("bot", response);
      }, 500);
    }

    function appendMessage(sender, text) {
      const chat = document.getElementById("chat");
      const msg = document.createElement("div");
      msg.className = `message ${sender}`;
      msg.textContent = text;
      chat.appendChild(msg);
      chat.scrollTop = chat.scrollHeight;
    }

    function getBotResponse(msg) {
      msg = msg.toLowerCase();

      // Sapaan
  if (msg.includes("halo") || msg.includes("hai") || msg.includes("hi"))
    return "Hai! Saya Bot, asisten virtual dari MyTics. Ada yang bisa saya bantu?";

  // Jadwal dan Event
  if (msg.includes("jadwal") || msg.includes("event"))
    return "Silakan lihat jadwal event di halaman Beranda yang Bot sediakan. Klik event untuk melihat detailnya.";

  // Pembelian Tiket
  if (msg.includes("beli") || msg.includes("tiket"))
    return "Untuk pembelian tiket, klik event yang Anda minati, lalu tekan tombol 'Beli Tiket'. Anda akan diarahkan ke halaman pembayaran.";

  // Pembayaran dengan DANA
  if (msg.includes("beli tiket") || msg.includes("pembelian"))
    return "Pembayaran dapat dilakukan menggunakan DANA. Setelah memilih tiket, Anda akan melihat pilihan metode pembayaran, termasuk DANA.";

  // Refund
  if (msg.includes("refund") || msg.includes("pengembalian"))
    return "Mohon maaf, saat ini MyTics tidak menerima permintaan refund. Silakan cek kebijakan kami di halaman bantuan.";

  // Kontak dan Customer Service
  if (msg.includes("kontak") || msg.includes("cs"))
    return "Anda bisa menghubungi tim kami melalui Instagram @MyTics.id atau email ke support@MyTics.com.";

  // Terima kasih
  if (msg.includes("terima kasih") || msg.includes("thanks"))
    return "Sama-sama! Jangan ragu bertanya lagi jika butuh bantuan.";

  // Tentang MyTics
  if (msg.includes("MyTics") || msg.includes("apa itu MyTics"))
    return "MyTics adalah platform digital yang memudahkan Anda mencari, menjelajahi, dan membeli tiket event menarik secara online.";

  // Panduan umum
  return "Maaf, saya belum mengerti pertanyaan Anda. Coba gunakan kata kunci seperti: jadwal, tiket, dana, atau kontak.";
}
  </script>
</body>
</html>