<?php

namespace App\Http\Controllers\Helpdesk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $unassignedTickets = Ticket::unassigned()->get();
        $myTickets = Ticket::mine()->get();
        $myCompletedTickets = Ticket::mine()->where('completed_at')->get();

        return view('helpdesk.dashboard.index', [
            'unassignedTickets' => $unassignedTickets,
            'myTickets' => $myTickets,
            'myCompletedTickets' => $myCompletedTickets,
        ]);
    }
}
