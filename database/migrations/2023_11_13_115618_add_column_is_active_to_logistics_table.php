<?php

use App\Models\Blog;
use App\Models\BlogTheme;
use App\Models\Campaign;
use App\Models\CampaignTheme;
use App\Models\Category;
use App\Models\CategoryTheme;
use App\Models\Product;
use App\Models\ProductTheme;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;


class AddColumnIsActiveToLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logistics', function (Blueprint $table) {
            $table->boolean('is_active')->nullable()->default(true);
        });

        try {

            $categories = Category::withoutGlobalScopes()->get(['id']);
            foreach($categories as $category){
                CategoryTheme::updateOrCreate([
                    'theme_id'=>1,
                    'category_id'=>$category->id
                ]);
            }

            $blogs = Blog::withoutGlobalScopes()->get(['id']);
            foreach($blogs as $blog){
                BlogTheme::updateOrCreate([
                    'theme_id'=>1,
                    'blog_id'=>$blog->id
                ]);
            }

            $products = Product::withoutGlobalScopes()->get(['id']);
            foreach($products as $product){
                ProductTheme::updateOrCreate([
                    'theme_id'=>1,
                    'product_id'=>$product->id
                ]);
            }

            $campaigns = Campaign::withoutGlobalScopes()->get(['id']);
            foreach($campaigns as $campaign){
                CampaignTheme::updateOrCreate([
                    'theme_id'=>1,
                    'campaign_id'=>$campaign->id
                ]);
            }

        } catch (\Throwable $th) {
            Log::info("error when insert demo theme data :". $th->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logistics', function (Blueprint $table) {
            $columns = ['is_active'];
            $table->dropColumn($columns);
        });
    }
}
