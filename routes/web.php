<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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
    return view('pages.welcome');
});

Route::post('/payment', [PaymentController::class, 'triggerPayment'])->name('payment');
Route::get('/payment/callback', [PaymentController::class, 'paystackcallback'])->name('paymentcallback');
Route::get('/payment/success', [PaymentController::class, 'paymentsuccess'])->name('paymentsuccess');
Route::get('/payment/fail', [PaymentController::class, 'paymentfailed'])->name('paymentfailed');
