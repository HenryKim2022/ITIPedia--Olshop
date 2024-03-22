<?php

namespace App\Models;

use App\Scopes\ThemeProductScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withoutGlobalScope(ThemeProductScope::class);
    }
    public function productWithTrashed()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed()->withoutGlobalScope(ThemeProductScope::class);
    }

    public function combinations()
    {
        return $this->hasMany(ProductVariationCombination::class);
    }

    public function product_variation_stock()
    {
        if(request()->hasHeader('Stock-Location-Id')){
        return $this->hasOne(ProductVariationStock::class)->where('location_id', request()->header('Stock-Location-Id'));
        }
        return $this->hasOne(ProductVariationStock::class)->where('location_id', session('stock_location_id'));
    }

    public function product_variation_stock_without_location()
    {
        return $this->hasOne(ProductVariationStock::class);
    }
}
