<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    // Menampilkan halaman detail pembayaran berdasarkan ID event
    public function showPayment($id)
    {
        try {
            Log::info("Mencari event ID: ".$id);
            
            // PERBAIKAN UTAMA: Pastikan memanggil model Event dengan benar
            $event = Event::find($id); // Bukan $event::find()
            
            if(!$event) {
                Log::error("Event tidak ditemukan");
                abort(404, 'Event tidak ditemukan');
            }
            
            return view('payment', compact('event'));
            
        } catch (\Exception $e) {
            Log::error("Error: ".$e->getMessage());
            abort(500, 'Terjadi kesalahan server');
        }
    
    return view('payment', compact('event'));
        // Data event dummy, bisa diganti dengan data dari database nanti
        $events = [
            1 => [
                'title' => 'FARMER MARKET',
                'date' => '20-23 FEBRUARI • 06:00 WIB',
                'location' => 'Kebun Buah dan Sayur',
                'price' => 'Rp 20.000',
                'image' => 'images/1.jpg',
            ],
            2 => [
                'title' => 'Pameran Seni Nasional',
                'date' => '20 April 2023 • 10:00 WIB',
                'location' => 'Gedung Kesenian',
                'price' => 'Rp 150.000',
                'image' => 'images/2.jpg',
            ],
            3 => [
                'title' => 'TECHNOLOGY EVENT',
                'date' => '19 OKTOBER 2025 • 08:00 WIB',
                'location' => 'Tech Center Jakarta',
                'price' => 'Rp 100.000',
                'image' => 'images/3.jpg',
            ],
            4 => [
                'title' => 'RUN AND FUN',
                'date' => '24 April 2025 • 07:00 WIB',
                'location' => 'Alun-alun Kota',
                'price' => 'Rp 30.000',
                'image' => 'images/4.jpg',
            ],
            5 => [
                'title' => 'WINTER FESTIVAL at BANDUNG',
                'date' => '10-12 DESEMBER 2025 • 11:00 WIB',
                'location' => 'Bandung Convention Center',
                'price' => 'Rp 150.000',
                'image' => 'images/5.jpg',
            ],
            6 => [
                'title' => 'Pameran Seni Indonesia',
                'date' => '16 November 2025 • 07:00-15:00 WIB',
                'location' => 'Museum Nasional',
                'price' => 'Rp 25.000',
                'image' => 'images/6.jpg',
            ],
        ];
    }
    
}
