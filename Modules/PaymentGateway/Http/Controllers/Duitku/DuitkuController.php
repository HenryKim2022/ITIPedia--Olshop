<?php

namespace Modules\PaymentGateway\Http\Controllers\Duitku;

use App\Models\User;
use App\Models\OrderGroup;
use Illuminate\Http\Request;
use App\Models\SubscriptionHistory;
use Illuminate\Support\Facades\Log;
use Royryando\Duitku\Facades\Duitku;
use Illuminate\Support\Facades\Redirect;
use Royryando\Duitku\Enums\DuitkuCallbackCode;
use Modules\PaymentGateway\Entities\GrassPeriodPayment;
use Royryando\Duitku\Http\Controllers\DuitkuBaseController;
use App\Http\Controllers\Backend\Payments\PaymentsController;

class DuitkuController extends DuitkuBaseController
{
    # duitku payment view
    public function initPayment()
    {
        $user = auth()->user();
        $amount = self::amount();       
        $methods = Duitku::paymentMethods((float)$amount);
        return view('payments.duitku', compact('methods'));
    }

    # duitku payment
    public function pay(Request $request)
    {
        $amount = self::amount(); 
        $method = $request->input('payment_method');
        $user = auth()->user();
        /*
         * Create invoice
         */
        $response = Duitku::createInvoice('Order-' . time(), (float) $amount, $method, 'Order', $user->name, $user->email, 30);
        if (!$response['success']) {
            abort(400, $response['message']);
        }
        /*
         * Redirect to the payment url
         */
        return Redirect::to($response['payment_url']);
    }

    # callback
    protected function paymentCallback(Request $request)
    {
        try {
            $merchantCode = config('duitku.merchant_code');
            $apiKey = config('duitku.api_key');
            $amount = $request->input('amount');
            $merchantOrderId = $request->input('merchantOrderId');
            $resultCode = $request->input('resultCode');
            $signature = $request->input('signature');

            //  Transaction status int to string
            if($resultCode == '00'){
                $transaction_status = 'success';
            }else if($resultCode == '01') {
                $transaction_status = 'pending';
            }else{
                $transaction_status ='cancel';
            }

            $user = null;
            $pendingRecord = GrassPeriodPayment::where('order_id', $merchantOrderId)->where('transaction_status', 'pending')->first();

           
            $data = [
                'json' => true,
                'order_id'=>$merchantOrderId
            ];


            if (!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature)) {
                $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
                $calcSignature = md5($params);

                if ($signature == $calcSignature) {
                    if ($resultCode == DuitkuCallbackCode::SUCCESS) {
                        // Payment success
                        if($pendingRecord) {
                            return (new PaymentsController)->payment_success(null);
                        }else {
                           return $this->success();
                        }
                    } else {
                        // Payment failed or expired
                       return $this->failed();
                    }
                } else {
                    // Bad signature
                   return $this->failed();
                }
            } else {
                // FAILED
              return  $this->failed();
            }

            if($pendingRecord && empty($signature) && $merchantOrderId) {
                return (new PaymentsController)->payment_success();
            }

        } catch (\Exception $ex) {
            Log::info("Duitku payment callback :" .$ex->getMessage());
            $this->failed();
        }
    }
    # success
    protected function success()
    {
        try {
            $payment = ["status" => "Success"];
            return (new PaymentsController)->payment_success(json_encode($payment));
        } catch (\Exception $e) {
            return (new PaymentsController)->payment_failed();
        }
    }

    # failed
    protected function failed()
    {
        return (new PaymentsController)->payment_failed();
    }

    # return
    public function myReturnCallback(Request $request)
    {
        $merchantOrderId = $request->input('merchantOrderId');
        $resultCode = $request->input('resultCode');

        //  Transaction status int to string
        if($resultCode == '00'){
            $transaction_status = 'success';
        }else if($resultCode == '01') {
            $transaction_status = 'pending';
        }else{
            $transaction_status ='cancel';
        }
        $user = null;
        $pendingRecord = GrassPeriodPayment::where('order_id', $merchantOrderId)->where('transaction_status', 'pending')->first();       


        $data = [
            'json' => true,
            'order_id'=>$merchantOrderId
        ];


        if ($request->resultCode) {
            if ($request->resultCode == DuitkuCallbackCode::SUCCESS) {
                if($pendingRecord) {
                    return (new PaymentsController)->payment_success();
                }else {
                  return $this->success();
                }
            }
        }else if($request->resultCode == '01') {

            $this->storeGrassPeriod($merchantOrderId, $transaction_status, $resultCode, null);
            flash(localize('Waiting for payment'))->error();
            clearPaymentSession();
            return redirect()->route('subscriptions.index');
        }
        return (new PaymentsController)->payment_failed();
    }
    public  function storeGrassPeriod($order_id, $transaction_status, $status_code, $response)
    {
        GrassPeriodPayment::updateOrCreate(
            [
                'order_id'=>$order_id,
                'user_id' => auth()->user()->id,
            ],
            [
                'transaction_status' => $transaction_status,
                'status_code' => $status_code,
                'response' => $response,
                'gateway'=>'Duitku'
            ]
        );
    }
    public static function amount()
    {
        $amount = 0;
        if (session('payment_type') == 'order_payment') {
            $orderGroup     = OrderGroup::where('order_code', session('order_code'))->first(['grand_total_amount']);
            return $amount  = $orderGroup->grand_total_amount;
        }

        if ($amount <= 0) {
            return (new PaymentsController)->payment_failed();
        }
    }
}
