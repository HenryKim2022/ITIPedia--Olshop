<?php

namespace App\Http\Controllers\Backend\Payments;

use App\Models\OrderGroup;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Backend\Payments\IyZico\IyZicoController;
use App\Http\Controllers\Backend\Payments\Paypal\PaypalController;
use App\Http\Controllers\Backend\Payments\Razorpay\RazorpayController;
use App\Http\Controllers\Backend\Payments\Paytm\PaytmPaymentController;
use App\Http\Controllers\Backend\Payments\Stripe\StripePaymentController;

use Modules\PaymentGateway\Http\Controllers\Midtrans\MidtransController;
use Modules\PaymentGateway\Http\Controllers\Paystack\PaystackController;
use Modules\PaymentGateway\Http\Controllers\Duitku\DuitkuController;
use Modules\PaymentGateway\Http\Controllers\Molile\MolilePaymentController;
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
        }else if ($payment_method == 'paystack') {
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
    }

    # payment successful
    public function payment_success($payment_details = null)
    {
        if (session('payment_type') == 'order_payment') {
            return (new CheckoutController())->updatePayments(json_encode($payment_details));
        }
        # else - other payments [update versions]
    }

    # payment failed
    public function payment_failed()
    {
        if (session('payment_type') == 'order_payment') {
            $orderGroup = OrderGroup::where('order_code', session('order_code'))->first();
            if (getSetting('enable_cod') == 1) {
                $orderGroup->payment_method = "cod";
                $orderGroup->save();
                # order success 
                clearOrderSession();
                flash(localize('Payment failed, Please pay in cash on delivery'))->success();
                return view('frontend.default.pages.checkout.invoice', ['orderGroup' => $orderGroup]);
            } else {
                # delete order
                $orderGroup->order->orderItems()->delete();
                $orderGroup->order()->delete();
                $orderGroup->delete();
                clearOrderSession();
                flash(localize('Payment failed, please try again'))->error();
                return redirect()->route('home');
            }
        }
    }
}
