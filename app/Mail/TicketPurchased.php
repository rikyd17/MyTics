<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketPurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

   public function build()
{
    return $this->subject('Tiket Anda Berhasil Dipesan')
        ->view('emails.ticket')
        ->with(['ticket' => $this->ticket]);
}

}