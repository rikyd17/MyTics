<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $users = \App\Models\User::all(); // Ambil SEMUA user
    $events = \App\Models\Event::all();
   foreach ($users as $user) {
        // Buat 1-3 tiket acak per user
        $randomEvents = $events->random(rand(1, 3));
        
       foreach ($randomEvents as $event) {

            \App\Models\Ticket::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => '08' . rand(1000, 9999) . rand(1000, 9999),
                'quantity' => rand(1, 3),
                'total_price' => $event->price * rand(1, 3),
                'payment_method' => 'dana', // Hanya DANA
                'status' => 'success',
                'code' => 'TKT-' . strtoupper(uniqid()),
                'created_at' => now()->subDays(rand(0, 30))
            ]);
}
    }
}
}
