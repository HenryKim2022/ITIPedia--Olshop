<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\ProductDetailsResource;
use App\Http\Resources\Api\ProductMiniResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchKey = null;
        $sort_by = $request->sort_by ? $request->sort_by : "new";
        $maxRange = Product::max('max_price');
        $min_value = 0;
        $per_page = 15;
        $max_value = $maxRange;

        $products = Product::isPublished();

        # conditional - search by
        if ($request->search != null) {
            $products = $products->where('name', 'like', '%' . $request->search . '%');
        }

        # pagination
        if ($request->per_page != null) {
            $per_page = $request->per_page;
        }

        # sort by
        if ($sort_by == 'new') {
            $products = $products->latest();
        } else {
            $products = $products->orderBy('total_sale_count', 'DESC');
        }

        # by price
        if ($request->min_price != null) {
            $min_value = $request->min_price;
        }
        if ($request->max_price != null) {
            $max_value = $request->max_price;
        }
        if ($request->min_price || $request->max_price) {
            $products = $products->where('min_price', '>=', $min_value)->where('min_price', '<=', $max_value);
        }

        # by category
        if ($request->category_id && $request->category_id != null) {
            $product_category_product_ids = ProductCategory::where('category_id', $request->category_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_category_product_ids);
        }

        # by tag
        if ($request->tag_id && $request->tag_id != null) {
            $product_tag_product_ids = ProductTag::where('tag_id', $request->tag_id)->pluck('product_id');
            $products = $products->whereIn('id', $product_tag_product_ids);
        }
        # conditional

        $products = $products->paginate(paginationNumber($per_page));
        return  ProductMiniResource::collection($products);
    }


    public function featured()
    {
        $featured_products = getSetting('featured_products_left') != null ? json_decode(getSetting('featured_products_left')) : [];
        $featured_products[] = getSetting('featured_products_right') != null ? json_decode(getSetting('featured_products_right')) : [];

        $products = Product::whereIn('id', $featured_products)->get();

        return ProductMiniResource::collection($products);
    }
    public function trendingProducts()
    {

        $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
        $products = Product::whereIn('id', $trending_products)->get();



        return ProductMiniResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (auth()->check() && auth()->user()->user_type == "admin") {
            // do nothing
        } else {

            // if ($product->is_published == 0) {
            //     $product = new Product();
            // }
        }

        return new ProductDetailsResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function relatedProducts(Request $request)
    {
        $product = Product::where('slug', $request->slug)->first();
        $productCategories              = $product->categories()->pluck('category_id');
        $productIdsWithTheseCategories  = ProductCategory::whereIn('category_id', $productCategories)->where('product_id', '!=', $product->id)->pluck('product_id');

        $relatedProducts                = Product::whereIn('id', $productIdsWithTheseCategories)->get();

        return ProductMiniResource::collection($relatedProducts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productPageWidgets(Request $request, $id)
    {
        $product_page_widgets = [];
        if (getSetting('product_page_widgets') != null) {
            $product_page_widgets = json_decode(getSetting('product_page_widgets'));
        }
        return response()->json($product_page_widgets);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bestSelling()
    {

        $best_selling_products = getSetting('best_selling_products') != null ? json_decode(getSetting('best_selling_products')) : [];
        $products = Product::whereIn('id', $best_selling_products)->get();

        return ProductMiniResource::collection($products);
    }


    public function FunctionName(Request $request)
    {

    }
}
