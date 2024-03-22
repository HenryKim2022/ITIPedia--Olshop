<?php

use App\Models\SystemSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\PaymentGateway\Entities\PaymentGateway;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('gateway');
            $table->string('image')->nullable();
            $table->boolean('is_recurring')->nullable()->default(false);
            $table->string('webhook_id')->nullable();
            $table->boolean('sandbox')->nullable()->default(false);
            $table->string('type')->nullable()->comment('sandbox, live');
            $table->tinyInteger('is_active')->nullable()->default(0);
            $table->tinyInteger('is_show')->nullable()->default(1);
            $table->tinyInteger('is_virtual')->nullable()->default(1);
            $table->string('service_charge')->nullable()->default(false);
            $table->string('charge_type')->nullable()->comment('1= flat, 2=percentage');
            $table->softDeletes();
            $table->timestamps();
        });
        try {
            $gateways = [
                [
                    'name'       => 'paypal',
                    'is_virtual' => 1,
                    'is_show'   => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/paypal.svg'
                ],
                [
                    'name'       => 'stripe',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/stripe.svg'
                ],
                [
                    'name'       => 'paytm',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/paytm.svg'
                ],
                [
                    'name'       => 'razorpay',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/razorpay.svg'
                ],
                [
                    'name'       => 'iyzico',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/iyzico.svg'
                ],
                [
                    'name'       => 'paystack',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/paystack.svg'
                ],
                [
                    'name'       => 'flutterwave',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/flutterwave.svg'
                ],
                [
                    'name'       => 'duitku',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/duitku.svg'
                ],
                [
                    'name'       => 'yookassa',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/yookassa.svg'
                ],
                [
                    'name'       => 'molile',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/molile.svg'
                ],
                [
                    'name'       => 'mercadopago',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/mercadopago.svg'
                ],
                [
                    'name'       => 'midtrans',
                    'is_virtual' => 1,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/midtrans.svg'
                ],
                [
                    'name'       => 'Offline_payment',
                    'is_virtual' => 0,
                    'is_show'    => 0,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/manual_payment.png'
                ],
                [
                    'name'       => 'Cash_on_Delivery',
                    'is_virtual' => 0,
                    'is_show'    => 1,
                    'path'       => 'Modules/PaymentGateway/Resources/assets/images/payments/cash_on_delivery.png'
                ],
            ];
            foreach ($gateways as $gateway) {
                $value = 'enable_' . $gateway['name'];
                $exitGateway = SystemSetting::where('entity', $value)->first();
                $status = 0;
                if($exitGateway) {
                    $status = $exitGateway->value ?? 0;
                }
                $sandbox = $gateway['name'] . '_sandbox';
                $sandboxSetting = SystemSetting::where('entity', $sandbox)->first();
                $sandboxStatus = 0;
                if($sandboxSetting) {
                    $sandboxStatus = $sandboxSetting->value ?? 0;
                }
                PaymentGateway::updateOrCreate([
                    'gateway' => $gateway['name']
                ], [
                    'sandbox'    => 1,
                    'is_active'  => $gateway['name'] == 'Cash_on_Delivery' ? 1 : 0,
                    'type'       => 'sandbox',
                    'is_virtual' => $gateway['is_virtual'],
                    'is_show'    => $gateway['is_show'],
                    'image'      => $gateway['path']
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
        Schema::dropIfExists('payment_gateways');
    }
}
