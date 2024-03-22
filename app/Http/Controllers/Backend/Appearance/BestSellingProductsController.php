<?php

namespace App\Http\Controllers\Backend\Appearance;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTheme;

class BestSellingProductsController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:homepage'])->only('index');
    }

    # best deal products
    public function index()
    {
        $theme_wise_product_ids = ProductTheme::where('theme_id', current_theme('default')->id)->pluck('product_id')->toArray();
        $products = Product::isPublished()->whereIn('id', $theme_wise_product_ids)->get();
        return view('backend.pages.appearance.homepage.bestSellingProducts', compact('products'));
    }

    # best deal products
    public function customProductsSection()
    {
        $theme_wise_product_ids = ProductTheme::where('theme_id', current_theme('default')->id)->pluck('product_id')->toArray();
        $products = Product::isPublished()->whereIn('id', $theme_wise_product_ids)->get();
        return view('backend.pages.appearance.homepage.customSectionProducts', compact('products'));
    }
}
