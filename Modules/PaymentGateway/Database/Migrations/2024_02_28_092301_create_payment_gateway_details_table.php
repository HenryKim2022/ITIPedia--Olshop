<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\PaymentGateway\Entities\PaymentGateway;
use Modules\PaymentGateway\Entities\PaymentGatewayDetail;

class CreatePaymentGatewayDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateway_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_gateway_id');
            $table->string('key')->nullable(); 
            $table->string('value')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        try {
            $gatewayDetails = [
                "PAYPAL_CLIENT_ID",
                "PAYPAL_CLIENT_SECRET",
                "STRIPE_KEY",
                "STRIPE_SECRET", 
                "PAYTM_ENVIRONMENT",
                "PAYTM_MERCHANT_ID", 
                "PAYTM_MERCHANT_KEY", 
                "PAYTM_MERCHANT_WEBSITE", 
                "PAYTM_CHANNEL", 
                "PAYTM_INDUSTRY_TYPE",
                "RAZORPAY_KEY",
                "RAZORPAY_SECRET",
                "IYZICO_API_KEY",
                "IYZICO_SECRET_KEY",
                "PAYSTACK_PUBLIC_KEY",
                "PAYSTACK_SECRET_KEY",
                "MERCHANT_EMAIL",
                "PAYSTACK_CURRENCY_CODE",
                "FLW_PUBLIC_KEY",
                "FLW_SECRET_KEY",
                "FLW_SECRET_HASH",
                "DUITKU_API_KEY",
                "DUITKU_MERCHANT_CODE",
                "DUITKU_CALLBACK_URL",
                "DUITKU_RETURN_URL",
                "DUITKU_ENV",
                "YOOKASSA_SHOP_ID",
                "YOOKASSA_SECRET_KEY",
                "YOOKASSA_CURRENCY_CODE",
                "YOOKASSA_RECIEPT",
                "YOOKASSA_VAT",
                "MOLILE_API_KEY",
                "MERCADOPAGO_SECRET_KEY",
                "MIDTRANS_SERVER_KEY",
                "MIDTRANS_CLIENT_KEY",
    
            ];
            foreach($gatewayDetails as $detail){
                $gatewayArray = explode('_', $detail);
                $gateway = strtolower($gatewayArray[0]);
                $name = $gateway;
                if($gateway == 'flw') {
                    $name = 'flutterwave';
                }elseif($gateway == 'merchant'){
                    $name = 'paystack';
                }
               
                $gatewayId = PaymentGateway::where('gateway', $name)->value('id');
    
                PaymentGatewayDetail::updateOrCreate([
                    'payment_gateway_id'=>$gatewayId,
                    'key'=>$detail,
                    'value'=>env($detail)
                ]);
            }
    
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gateway_details');
    }
}
