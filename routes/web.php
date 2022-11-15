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
Route::get('/about', [App\Http\Controllers\FrontEndController::class, 'index'])->name('about');
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home'])->name('welcome');
Route::get('/praise-atmosphere/events/{event}',[App\Http\Controllers\FrontEndController::class, 'homeEvent'] )->name('home-event');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events.list')->middleware('auth');
Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware('auth');
Route::get('/create-event',[EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::get('/events/{event}', [EventController::class, 'show']);
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit')->middleware('auth');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update')->middleware('auth');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth');

Route::get('/events/{event}/tickets', [TicketController::class, 'eventTickets'])->name('tickets.list')->middleware('auth');
Route::get('/events/{event}/tickets-tables', [TicketController::class, 'eventTicketsTables'])->name('tickets.tables')->middleware('auth');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.all')->middleware('auth');
Route::get('/all-tickets-table', [TicketController::class, 'allTicketsTable'])->name('all.tickets.table')->middleware('auth');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.all')->middleware('auth');
Route::get('/payments-table', [PaymentController::class, 'allPaymentsTable'])->name('payments.table')->middleware('auth');
Route::get('/events/{event}/payments', [PaymentController::class, 'eventPayments'])->name('payments.event')->middleware('auth');
Route::get('/events/{event}/payments-table', [PaymentController::class, 'eventPaymentsTable'])->name('payments.event.table')->middleware('auth');
//route to check payment using merchant request id
Route::post('/payments/{merchantRequestID}', [PaymentController::class, 'checkPayment'])->name('payments.check');

Route::post('events/{event}/pay', [PaymentController::class, 'stkpush'])->name('payments.stkpush');
Route::post('mpesa/callback/url', [PaymentController::class, 'MpesaResponse']);

//confirming the ticket is valid
Route::post('tickets/confirm', [TicketController::class, 'updateStatus']);
