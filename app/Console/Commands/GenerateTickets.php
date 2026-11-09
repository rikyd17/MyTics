<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:generate {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate tickets automatically';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    $count = $this->argument('count');
    
    \App\Models\Ticket::factory()
        ->count($count)
        ->create();
    
    $this->info("Successfully generated {$count} tickets!");
}
}
