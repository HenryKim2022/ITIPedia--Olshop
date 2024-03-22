<?php

namespace Modules\PaymentGateway\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\PaymentGateway\Http\Controllers\Duitku\DuitkuController;
use Modules\PaymentGateway\Http\Controllers\IyZico\IyZicoController;
use Modules\PaymentGateway\Http\Controllers\Paypal\PaypalController;
use Modules\PaymentGateway\Http\Controllers\Midtrans\MidtransController;
use Modules\PaymentGateway\Http\Controllers\Paystack\PaystackController;
use Modules\PaymentGateway\Http\Controllers\Razorpay\RazorpayController;
use Modules\PaymentGateway\Http\Controllers\Paytm\PaytmPaymentController;
use Modules\PaymentGateway\Http\Controllers\Molile\MolilePaymentController;
use Modules\PaymentGateway\Http\Controllers\Stripe\StripePaymentController;
use Modules\PaymentGateway\Http\Controllers\Flutterwave\FlutterwaveController;
use Modules\PaymentGateway\Http\Controllers\Yookassa\YookassaPaymentController;
use Modules\PaymentGateway\Http\Controllers\Mercadopago\MercadopagoPaymentController;




class PaymentsController extends Controller
{
    # init payment gateway
    public function initPayment()
    {
        $payment_method = session('payment_method');
        if ($payment_method == 'paypal') {

            return (new PaypalController())->initPayment();
        } else if ($payment_method == 'stripe') {
            return (new StripePaymentController())->initPayment();
        } else if ($payment_method == 'paytm') {
            return (new PaytmPaymentController())->initPayment();
        } else if ($payment_method == 'razorpay') {
            return (new RazorpayController())->initPayment();
        } else if ($payment_method == 'iyzico') {
            return (new IyZicoController)->initPayment();
        } else if ($payment_method == 'paystack') {
            return (new PaystackController)->initPayment();
        } else if ($payment_method == 'flutterwave') {
            return (new FlutterwaveController)->initPayment();
        } else if ($payment_method == 'duitku') {
            return (new DuitkuController)->initPayment();
        } else if ($payment_method == 'yookassa') {
            return (new YookassaPaymentController)->initPayment();
        } else if ($payment_method == 'molile') {
            return (new MolilePaymentController)->initPayment();
        } else if ($payment_method == 'mercadopago') {
            return (new MercadopagoPaymentController)->initPayment();
        } else if ($payment_method == 'midtrans') {
            return (new MidtransController)->initPayment();
        }
        # todo::[update versions] more gateways
        return $this->payment_success();
    }
    public function payment_success()
    {
        
    }

}
