<?php

namespace App\Http\Middleware;
use App;
use Closure;
use Illuminate\Http\Request;

class AppLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $locale = 'en';
        // Check header request and determine localizaton
        if($request->hasHeader('App-Language')){
            $locale = $request->header('App-Language');
        }
        elseif(env('DEFAULT_LANGUAGE') != null){
            $locale = env('DEFAULT_LANGUAGE');
        }

        // set laravel localization
        App::setLocale($locale);

        return $next($request);
    }
}
