<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //  retrun first event where status is upcoming
    $event = App\Models\Event::where('status', 'upcoming')->first();
    return view('welcome', compact('event'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events.list');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/create-event',[EventController::class, 'create'])->name('events.create');
Route::get('/events/{event}', [EventController::class, 'show']);
Route::put('/events/{event}', [EventController::class, 'update']);
Route::delete('/events/{event}', [EventController::class, 'destroy']);

Route::get('/events/{event}/tickets', [TicketController::class, 'eventTickets'])->name('tickets.list');
Route::get('/events/{event}/tickets-tables', [TicketController::class, 'eventTicketsTables'])->name('tickets.tables');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.all');
Route::get('/all-tickets-table', [TicketController::class, 'allTicketsTable'])->name('all.tickets.table');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.all');
Route::get('/payments-table', [PaymentController::class, 'allPaymentsTable'])->name('payments.table');
Route::get('/events/{event}/payments', [PaymentController::class, 'eventPayments'])->name('payments.event');
Route::get('/events/{event}/payments-table', [PaymentController::class, 'eventPaymentsTable'])->name('payments.event.table');

Route::post('events/{event}/pay', [PaymentController::class, 'stkpush'])->name('payments.stkpush');
Route::post('mpesa/callback/url', [PaymentController::class, 'MpesaResponse']);

//confirming the ticket is valid
Route::post('tickets/confirm', [TicketController::class, 'updateStatus']);
