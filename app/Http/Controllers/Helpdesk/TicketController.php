<?php

namespace App\Http\Controllers\Helpdesk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->paginate(15);

        return view('helpdesk.ticket.index', [
            'tickets' => $tickets
        ]);
    }
}
