<?php

namespace App\Http\Controllers\Backend\Appearance;

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
        $theme_base_category_ids = CategoryTheme::where('theme_id', current_theme('default')->id)->pluck('category_id')->toArray();

        $categories = Category::latest()->whereIn('id', $theme_base_category_ids)->get();
        return view('backend.pages.appearance.homepage.topCategories', compact('categories'));
    }
}
