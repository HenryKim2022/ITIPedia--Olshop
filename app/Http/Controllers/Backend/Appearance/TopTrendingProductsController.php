<?php

namespace App\Http\Controllers\Backend\Appearance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTheme;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class TopTrendingProductsController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:homepage'])->only('index');
    }

    # trending products
    public function index()
    {
        $theme_base_category_ids = CategoryTheme::where('theme_id', current_theme('default')->id)->pluck('category_id')->toArray();
        $categories = Category::latest()->whereIn('id', $theme_base_category_ids)->get();
        return view('backend.pages.appearance.homepage.topTrendingProducts', compact('categories'));
    }

    # get products based on category
    public function getProducts(Request $request)
    {

        $html = '';
        $categories = $request->trending_product_categories ?? $request->halal_popular_product_categories;
        if ($categories) {
            $productIdsFromCategories = ProductCategory::whereIn('category_id', $categories)->pluck('product_id');
            $products = Product::whereIn('id', $productIdsFromCategories)->get();

            if($request->trending_product_categories){
                $top_trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
            }else if ($request->halal_popular_product_categories){
                $top_trending_products = getSetting('halal_popular_products') != null ? json_decode(getSetting('halal_popular_products')) : [];
            }

            foreach ($products as $product) {
                if (in_array($product->id, $top_trending_products)) {
                    $html .= '<option value="' . $product->id . '" selected>' . $product->collectLocalization('name') . '</option>';
                } else {
                    $html .= '<option value="' . $product->id . '">' . $product->collectLocalization('name') . '</option>';
                }
            }
        }

        echo json_encode($html);
    }
}
