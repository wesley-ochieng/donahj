<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        $total_payments = Payment::sum('TransAmount');
        $total_tickets_sold = Ticket::where('status', '!=', 'unpaid')->count();
        return view('events.index', compact('events','total_payments', 'total_tickets_sold'));
    }
}
