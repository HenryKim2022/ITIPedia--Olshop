<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentGateway\Http\Controllers\Duitku\DuitkuController;
use Modules\PaymentGateway\Http\Controllers\PaymentGatewayController;
use Modules\PaymentGateway\Http\Controllers\Midtrans\MidtransController;
use Modules\PaymentGateway\Http\Controllers\Paystack\PaystackController;
use Modules\PaymentGateway\Http\Controllers\Molile\MolilePaymentController;
use Modules\PaymentGateway\Http\Controllers\Flutterwave\FlutterwaveController;
use Modules\PaymentGateway\Http\Controllers\Yookassa\YookassaPaymentController;
use Modules\PaymentGateway\Http\Controllers\Mercadopago\MercadopagoPaymentController;

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

Route::prefix('payment-gateway')->group(function () {
    Route::get('/', 'PaymentGatewayController@index');

    // gateway settings
    Route::group(['prefix' => 'settings', 'as' => 'payment-gateway-setting.', 'middleware' => ['auth', 'verified']], function ($routes) {
        $routes->get('/', [PaymentGatewayController::class, 'index'])->name('index');
        $routes->post('/', [PaymentGatewayController::class, 'store'])->name('store');
        $routes->get('/', [PaymentGatewayController::class, 'index'])->name('index');
    });
});

# midtrans
Route::get('/midtrans/payment/callback', [MidtransController::class, 'callback'])->name('midtrans.callback');
Route::get('/midtrans/payment/finish', [MidtransController::class, 'success'])->name('midtrans.success');
Route::get('/midtrans/payment/unfinish', [MidtransController::class, 'failed'])->name('midtrans.failed');
Route::get('/midtrans/payment/error', [MidtransController::class, 'failed'])->name('midtrans.error');
Route::post('/midtrans/payment/payment-notification', [MidtransController::class, 'paymentNotification'])->name('midtrans.payment-notification');
Route::post('/midtrans/payment/pay-account-notification', [MidtransController::class, 'payAccountNotification'])->name('midtrans.pay-account-notification');
Route::post('/midtrans/payment/recurring-notification', [MidtransController::class, 'recurringNotification'])->name('midtrans.recurring-notification');
# paystack
Route::any('/paystack/payment/callback', [PaystackController::class, 'callback'])->name('paystack.callback');
# flutterwave
Route::any('/flutterwave/payment/callback', [FlutterwaveController::class, 'callback'])->name('flutterwave.callback');

# duitku
Route::any('/duitku/payment/callback', [DuitkuController::class, 'paymentCallback'])->name('duitku.callback');
Route::any('/duitku/payment/submit', [DuitkuController::class, 'pay'])->name('duitku.pay');
Route::any('/duitku/payment/return', [DuitkuController::class, 'myReturnCallback'])->name('duitku.return');

# yookassa
Route::get('/youkassa/finish', [YookassaPaymentController::class, 'finish'])->name('youkassa.finish');



# molile
Route::get('/molile/redirect', [MolilePaymentController::class, 'redirect'])->name('molile.redirect');

# mercadopago
Route::get('/mercadopago/redirect', [MercadopagoPaymentController::class, 'redirect'])->name('mercadopago.redirect');
Route::get('/mercadopago/failed', [MercadopagoPaymentController::class, 'failed'])->name('mercadopago.failed');
