<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\EnmartModule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temporary_product_import_data', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('added_by')->default('admin');
            $table->string('name');
            $table->string('slug');
            $table->integer('brand_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->text('thumbnail_image')->nullable();
            $table->longText('gallery_images')->nullable();
            $table->longText('product_tags')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->double('price')->default(0.00);
            $table->double('min_price')->default(0.00);
            $table->double('max_price')->default(0.00);
            $table->double('discount_value')->default(0.00);
            $table->string('discount_type')->nullable();
            $table->integer('discount_start_date')->nullable();
            $table->integer('discount_end_date')->nullable();
            $table->integer('sell_target')->nullable();
            $table->integer('stock_qty')->default(0);
            $table->text('sku')->nullable();
            $table->text('code')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('min_purchase_qty')->default(1);
            $table->integer('max_purchase_qty')->default(1);
            $table->tinyInteger('has_variation')->default(1);
            $table->tinyInteger('has_warranty')->default(1);
            $table->double('total_sale_count')->default(0.00);
            $table->integer('standard_delivery_hours')->default(24);
            $table->integer('express_delivery_hours')->default(24);
            $table->text('size_guide')->nullable();
            $table->mediumText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_img')->nullable();
            $table->bigInteger('reward_points')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        try {
            $defaultModules = ['PaymentGateway'];
            foreach($defaultModules as $module){
                EnmartModule::updateOrCreate([
                    'name'=>$module
                ], [
                    'is_default'=>1
                ]);
            }
            $users    = User::whereNull('shop_id')->update(['shop_id'=>1]);
            $coupons  = Coupon::whereNull('shop_id')->update(['shop_id'=>1]);
            $products = Product::whereNull('shop_id')->update(['shop_id'=>1]);
            $orders   = Order::whereNull('shop_id')->update(['shop_id'=>1]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::info('temporary product import data migration issues : '.$th->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_product_import_data');
    }
};
