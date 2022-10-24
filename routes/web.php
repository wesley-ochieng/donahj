<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;

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
    return view('welcome');
});

//resource route
// Route::resource('events', [EventController::class]);
// Route::resource('tickets', [TicketController::class]);
// Route::post('event/{event}/pay', [PaymentController::class, 'stkpush'])->name('tickets.pay');
// //mpesa callback route
// Route::post('mpesa/callback/url', [PaymentController::class, 'MpesaResponse']);