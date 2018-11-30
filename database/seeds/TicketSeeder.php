<?php

use Illuminate\Database\Seeder;
use App\Ticket;
use App\TicketStatus;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Open', 'On Hold', '', 'Resolved'] as $label) {
            TicketStatus::create([
                'label' => $label
            ]);
        }

        factory(Ticket::class, 100)->create();
    }
}
