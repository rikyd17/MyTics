<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;

// Halaman umum
Route::view('/', 'welcome');
Route::view('/comingsoon', 'comingsoon');
Route::view('/helpcenter', 'helpcenter');

// Event info statis
Route::view('/info1', 'info1');
Route::view('/info2', 'info2');
Route::view('/info3', 'info3');
Route::view('/info4', 'info4');
Route::view('/info5', 'info5');
Route::view('/info6', 'info6');

// Auth (login/register) hanya untuk guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route khusus untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // Halaman beranda
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');

    // Tiket
    Route::middleware('auth')->group(function () {
    Route::get('/tiket-saya', [TicketController::class, 'index'])->name('tickets.index');
    });
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{id}/cancel', [TicketController::class, 'cancel'])->name('tickets.cancel');
    Route::get('/tickets/statistics', [TicketController::class, 'statistics'])->name('tickets.statistics');

    // Pembayaran & pembelian tiket
    Route::get('/event/{id}/buy', [EventController::class, 'showPayment'])->name('event.payment')
    ->middleware('auth');
    Route::post('/events/{id}/tickets', [TicketController::class, 'store'])
    ->name('tickets.store')
    ->middleware('auth');

    //Download PDF setelah tiket terbeli
    Route::get('/tickets/{id}/download', [TicketController::class, 'download'])
    ->name('tickets.download')
    ->middleware('auth');
});
