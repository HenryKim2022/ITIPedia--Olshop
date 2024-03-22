<?php

namespace Modules\PaymentGateway\Http\Controllers\Molile;

use Session;
use App\Models\OrderGroup;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\Payments\PaymentsController;

class MolilePaymentController extends Controller
{
    public function initPayment()
    {
        $amount = session('amount');
        $currencyCode = 'USD';
        $amount = priceToUsd($amount);
        $amount = $this->_calculateAmount();
        
        try {
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey(env('MOLILE_API_KEY'));
           
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => strtoupper($currencyCode),
                    "value" => number_format($amount, 2, '.', '')
                ],
                "description" => 'Package Subscription Payment',
                "redirectUrl" => route('molile.redirect'),
            ]);
            Session::put('pay_id', $payment->id);
            return redirect($payment->getCheckoutUrl());
        } catch (\Exception $e) {
           Log::info('Molile payment initpayment issue :'.$th->getMessage());
            return (new PaymentsController)->payment_failed();
        }
    }

    public function redirect()
    {
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey(env('MOLILE_API_KEY'));
        $pay_id = Session::get('pay_id');
        $payment = $mollie->payments->get($pay_id);

        if ($payment->isPaid()) {
            $payment = ["status" => "Success"];
            return (new PaymentsController)->payment_success(json_encode($payment));
        } else {
            return (new PaymentsController)->payment_failed();
        }
    }
    private function _calculateAmount()
    {
        $amount = 0;
        if (session('payment_type') == 'order_payment') {
            $orderGroup = OrderGroup::where('order_code', session('order_code'))->first(['grand_total_amount']);
            return $amount = $orderGroup->grand_total_amount;
        }
        
        if ($amount <= 0) {
            return (new PaymentsController)->payment_failed();
        }
    }
}
