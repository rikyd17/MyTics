<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket {{ $ticket->code }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }
        .ticket-container {
            border: 2px solid #6f42c1;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #6f42c1;
            text-align: center;
        }
        .section {
            margin-bottom: 15px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 1px solid #6f42c1;
            padding-bottom: 3px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .qr-code img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <h1>Tiket Event</h1>
        
        <img src="{{ asset($ticket->event->image ?? 'img/default.jpg') }}" alt="{{ $ticket->event->name ?? 'Event' }}" class="gambar-tiket">

        <div class="section">
            <div class="section-title">Kode Tiket</div>
            <div>{{ $ticket->code }}</div>
        </div>

        <div class="section">
            <div class="section-title">Nama</div>
            <div>{{ $ticket->name }}</div>
        </div>

        <div class="section">
            <div class="section-title">Email</div>
            <div>{{ $ticket->email }}</div>
        </div>

        <div class="section">
            <div class="section-title">Telepon</div>
            <div>{{ $ticket->phone }}</div>
        </div>

        <div class="section">
            <div class="section-title">Event</div>
            <div>{{ $ticket->event->title ?? 'N/A' }}</div>
        </div>

        <div class="section">
            <div class="section-title">Tanggal & Waktu</div>
            <div>{{ $ticket->event->date ?? 'N/A' }}</div>
        </div>

        <div class="section">
            <div class="section-title">Lokasi</div>
            <div>{{ $ticket->event->location ?? 'N/A' }}</div>
        </div>

        <div class="section">
            <div class="section-title">Jumlah Tiket</div>
            <div>{{ $ticket->quantity }}</div>
        </div>

        <div class="section">
            <div class="section-title">Total Harga</div>
            <div>Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</div>
        </div>

        <div class="section">
            <div class="section-title">Metode Pembayaran</div>
            <div>{{ $ticket->payment_method }}</div>
        </div>

        {{-- <div class="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=TKT-684AD6EC2C9F4&size=150x150">
        </div> --}}
    </div>
</body>
</html>
