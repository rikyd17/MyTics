<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Tiket</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .ticket-info { background: #f5f5f5; padding: 20px; border-radius: 5px; }
        .header { color: #6f42c1; }
    </style>
</head>
<body>
    <h2 class="header">Terima kasih telah membeli tiket!</h2>
    
    <div class="ticket-info">
        <h3>{{ $ticket->event_title }}</h3>
        <p><strong>Tanggal:</strong> {{ $ticket->event_date->format('l, d F Y H:i') }}</p>
        <p><strong>Lokasi:</strong> {{ $ticket->event_location }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $ticket->quantity }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</p>
        <p><strong>Kode Tiket:</strong> {{ $ticket->ticket_code }}</p>
    </div>
    
    <p>Tunjukkan kode tiket ini saat registrasi di lokasi event.</p>
    
    <p>Terima kasih,<br>Tim {{ config('app.name') }}</p>
</body>
</html>