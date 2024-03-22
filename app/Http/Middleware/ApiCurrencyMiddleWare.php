<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use Closure;
use Illuminate\Http\Request;

class ApiCurrencyMiddleWare
{
    private  static $currentCurrency = null;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasHeader('Currency-Code')) {
            $currency_code = $request->header('Currency-Code');
        } else {
            $currency_code = env('DEFAULT_CURRENCY');
        }
        ApiCurrencyMiddleWare::$currentCurrency = Currency::where('code', $currency_code)->first();
        return $next($request);
    }

    public static function currencyData()
    {
        return ApiCurrencyMiddleWare::$currentCurrency;
    }
}
