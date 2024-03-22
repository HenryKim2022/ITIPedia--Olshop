<?php

namespace App\Models;

use App\Scopes\ThemeCouponScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new ThemeCouponScope);
    }

    public function scopeShop($query)
    {
        return $query->where('shop_id', Auth::user()->shop_id ?? 1);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'coupon_themes', 'coupon_id', 'theme_id');
    }

}
