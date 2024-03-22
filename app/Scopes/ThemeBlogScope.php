<?php

namespace App\Scopes;

use App\Models\BlogTheme;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Route;

class ThemeBlogScope implements Scope
{ 
    public function apply(Builder $builder, Model $model)
    {    
        $middlewares = Route::current()? Route::current()->gatherMiddleware():['admin'];
        if(!in_array("admin", $middlewares)){
            $active_themes = getSetting('active_themes') != null ? json_decode(getSetting('active_themes')) : [1]; 
            $theme   = session('theme');  
            if(!is_null($theme)){
                $theme   = Theme::whereIn('id', $active_themes)->where('code', $theme)->first();
            }

            if(is_null($theme)){
                $theme   = Theme::where('id', $active_themes[0])->first();
            }

            $blogIds = BlogTheme::where('theme_id',$theme->id)->pluck('blog_id'); 
            $builder->whereIn('id', $blogIds); 
        } 
    }
}