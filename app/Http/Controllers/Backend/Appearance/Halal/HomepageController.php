<?php

namespace App\Http\Controllers\Backend\Appearance\Halal;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogTheme;
use App\Models\Category;
use App\Models\CategoryTheme;
use App\Models\Product;
use App\Models\ProductTheme;

class HomepageController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:homepage'])->only(['aboutUs']);
    } 

    # homepage aboutUs configuration
    public function aboutUs()
    { 
        return view('backend.pages.appearance.halal.homepage.aboutUs');
    }

    # homepage features configuration
    public function features()
    { 
        return view('backend.pages.appearance.halal.homepage.features');
    }

    # homepage popular configuration
    public function popular()
    { 
        $theme_base_category_ids = CategoryTheme::where('theme_id', current_theme('halal')->id)->pluck('category_id')->toArray();
        $categories = Category::latest()->whereIn('id', $theme_base_category_ids)->get();
        return view('backend.pages.appearance.halal.homepage.popularProducts', compact('categories'));
    }

    # homepage whyChooseUs configuration
    public function whyChooseUs()
    { 
        return view('backend.pages.appearance.halal.homepage.whyChooseUs');
    }

    # homepage onSaleProducts configuration
    public function onSaleProducts()
    { 
        $theme_wise_product_ids = ProductTheme::where('theme_id', current_theme('halal')->id)->pluck('product_id')->toArray();
        $products = Product::latest()->whereIn('id', $theme_wise_product_ids)->get();
        return view('backend.pages.appearance.halal.homepage.onSaleProducts',compact('products'));
    }

    # homepage blogs configuration
    public function blogs()
    { 
        $theme_wise_blog_ids = BlogTheme::where('theme_id', current_theme('halal')->id)->pluck('blog_id')->toArray();
        $blogs = Blog::latest()->whereIn('id', $theme_wise_blog_ids)->get();
        return view('backend.pages.appearance.halal.homepage.blogs',compact('blogs'));
    }
}
