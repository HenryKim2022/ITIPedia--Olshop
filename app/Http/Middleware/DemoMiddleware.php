<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(env('DEMO_MODE') === 'On'){
            if(request()->method() != 'GET'){
                flash(localize('You are not allowed this action in demo'))->error();
                return back();
            }
        }
        return $next($request);
    }
}
