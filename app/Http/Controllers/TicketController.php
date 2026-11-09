<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan daftar tiket user
     */
    public function index()
    {
        try {
            $user = auth()->user();
            $tickets = Ticket::where('user_id', $user->id)
                ->with('event')
                ->latest()
                ->get();

            return view('tickets.tiket', compact('tickets'));
        } catch (\Exception $e) {
            Log::error('Error mengambil tiket', ['error' => $e->getMessage()]);
            return redirect()->route('home')
                ->with('error', 'Terjadi kesalahan saat memuat tiket: ' . $e->getMessage());
        }
    }

    /**
     * Menyimpan tiket baru
     */
    public function store(Request $request, $eventId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'quantity' => 'required|integer|min:1|max:10',
            'payment_method' => 'required|string|max:50',
        ]);

        DB::beginTransaction();
        try {
            \Log::info('Mencari event ID: '.$eventId);
            $event = Event::findOrFail($eventId);
            $user = Auth::user();

            \Log::info('Membuat tiket untuk user ID: '.$user->id);

            $ticket = Ticket::create([  
                'user_id' => $user->id,
                'event_id' => $event->id,
                'name' => $validated['name'],
                'email' => $user->email,
                'phone' => $validated['phone'],
                'quantity' => $validated['quantity'],
                'total_price' => $event->price * $validated['quantity'],
                'payment_method' => $validated['payment_method'],
                'status' => 'success',
                'code' => 'TKT-'.strtoupper(uniqid())
            ]);

            \Log::info('Tiket berhasil dibuat dengan ID: '.$ticket->id);

            DB::commit();

            return redirect()->route('tickets.index')
                ->with('success', 'Pembelian berhasil! Kode tiket: '.$ticket->code)
                ->with('new_ticket_id', $ticket->id);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            \Log::error('Event tidak ditemukan');
            return back()->with('error', 'Event tidak ditemukan');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error processing ticket purchase: '.$e->getMessage());
            \Log::error($e->getTraceAsString());
            return back()->with('error', 'Gagal memproses pembelian: '.$e->getMessage());
        }
    }

    /**
     * Download ticket as PDF
     */
    public function download($id)
    {
        $ticket = Ticket::with('event', 'user')->findOrFail($id);

        // Check if the authenticated user owns the ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $qrCodeSvg = QrCode::format('svg')->size(150)->generate($ticket->code);

        $pdf = Pdf::loadView('tickets.pdf', compact('ticket', 'qrCodeSvg'));

        return $pdf->download('ticket-' . $ticket->code . '.pdf');
    }
}
