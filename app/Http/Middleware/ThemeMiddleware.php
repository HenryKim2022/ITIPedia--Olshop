<?php

namespace App\Http\Middleware;

use App\Models\Theme;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ThemeMiddleware
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
        try {
            if(Schema::hasTable('themes') && Schema::hasTable('system_settings')){  
                $active_themes = getSetting('active_themes') != null ? json_decode(getSetting('active_themes')) : [1];  
                $theme   = session('theme'); 
                if(!is_null($theme)){
                    $theme   = Theme::whereIn('id', $active_themes)->where('code', $theme)->first();
                }
    
                if(is_null($theme)){
                    $theme   = Theme::where('id', $active_themes[0])->first();
                }
                session(['theme' => $theme->code]);
            } 
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $next($request);
    }
}
