<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_banned) {

            if($request->expectsJson()){
               // auth()->user->tokens()->where('id', auth()->user->currentAccessToken()->id)->delete();
                return response()->json([
                    'result' => false,
                    "is_banned"=>true,
                    'message' => localize("You have been banned")
                ]);

            }

            $redirect_to = "";
            if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {
                $redirect_to = "login";
            } else {
                $redirect_to = "home";
            }

            auth()->logout();

            flash(localize("You have been banned"))->error();

            return redirect()->route($redirect_to);
        }

        return $next($request);
    }
}
