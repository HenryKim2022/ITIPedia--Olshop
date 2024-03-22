<?php

namespace App\Http\Controllers\Backend\Appearance\Halal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTheme;

class TopCategoriesController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:homepage'])->only('index');
    }

    # top categories
    public function index()
    {
        $theme_base_category_ids = CategoryTheme::where('theme_id', current_theme('halal')->id)->pluck('category_id')->toArray();
        $categories = Category::latest()->whereIn('id', $theme_base_category_ids)->get();
        return view('backend.pages.appearance.halal.homepage.topCategories', compact('categories'));
    }
}
