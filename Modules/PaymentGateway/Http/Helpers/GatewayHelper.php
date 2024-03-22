<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Modules\PaymentGateway\Entities\PaymentGateway;
use Modules\PaymentGateway\Entities\PaymentGatewayDetail;

if (!function_exists('paymentGateway')) {
    function paymentGateway($type = null)
    {
        $paymentGateway = Cache::remember('paymentGateway', 86400, function () {
            return PaymentGateway::all();
        });
        if ($type) {
            $paymentGateway = $paymentGateway->where('gateway', $type)->first();
        }
        return $paymentGateway;
    }
}
if (!function_exists('paymentGatewayValue')) {
    function paymentGatewayValue($gateway, $key)
    {
        $paymentGateway = paymentGateway($gateway);
        $value = '';
        if ($paymentGateway) {
            $gateway_id = $paymentGateway->id;
            $value = PaymentGatewayDetail::where('payment_gateway_id', $gateway_id)->where('key', $key)->value('value');
        }
        return $value;
    }
}
if (!function_exists('imagePath')) {
    # return path for module assets
    function imagePath($path, $secure = null)
    {
        if (str_contains(url('/'), '.test') || str_contains(url('/'), 'http://127.0.0.1:')) {
            return app('url')->asset('' . $path, $secure) . '?v=' . env('APP_VERSION');
        }
        return app('url')->asset($path, $secure) . '?v=' . env('APP_VERSION');
    }
}

if (!function_exists('optimizeClear')) {
    # clear server cache
    function optimizeClear()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
    }
}

if (!function_exists('clearPaymentSession')) {
    # clear session cache
    function clearPaymentSession()
    {
        session()->forget('package_id');
        session()->forget('amount');
        session()->forget('payment_method');
        session()->forget('admin_customer');
        session()->forget('active_now');
    }
}