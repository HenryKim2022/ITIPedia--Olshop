<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->nullable()->change();
            $table->unsignedBigInteger('role_id')->nullable()->change();
            $table->unsignedBigInteger('avatar')->nullable()->change();
            $table->unsignedBigInteger('location_id')->nullable()->default(NULL)->change();
            $table->dateTime('deleted_at')->change();

            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('avatar')->references('id')->on('media_managers');
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_image')->nullable()->change();
            $table->unsignedBigInteger('meta_image')->nullable()->change();
            $table->foreign('brand_image')->references('id')->on('media_managers');
            $table->foreign('meta_image')->references('id')->on('media_managers');
        });


        Schema::table('brand_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->nullable()->change();
            $table->unsignedBigInteger('meta_image')->nullable()->change();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('meta_image')->references('id')->on('media_managers');
        });


        Schema::table('unit_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->nullable()->change();
            $table->foreign('unit_id')->references('id')->on('units');
        });

        Schema::table('variation_values', function (Blueprint $table) {
            $table->unsignedBigInteger('variation_id')->nullable()->change();
            $table->unsignedBigInteger('image')->nullable()->change();
            $table->foreign('variation_id')->references('id')->on('variations');
            $table->foreign('image')->references('id')->on('media_managers');
        });


        Schema::table('variation_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('variation_id')->nullable()->change();
            $table->foreign('variation_id')->references('id')->on('variations');
        });

        Schema::table('variation_value_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('variation_value_id')->nullable()->change();
            $table->unsignedBigInteger('image')->nullable()->change();
            $table->foreign('variation_value_id')->references('id')->on('variation_values');
            $table->foreign('image')->references('id')->on('media_managers');
        });

        Schema::table('taxes', function (Blueprint $table) {
            $table->dateTime('deleted_at');
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('shop_logo')->change();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shop_logo')->references('id')->on('media_managers');
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id')->change();
            $table->unsignedBigInteger('banner')->nullable()->change();

            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('banner')->references('id')->on('media_managers');
        });

        Schema::table('coupon_usages', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::table('categories', function (Blueprint $table) {
            $table->dateTime('deleted_at');
        });

        // Make Category Parent ID Nullable instead of 0
        \App\Models\Category::query()->where("parent_id", "=", 0)->update(["parent_id" => null]);


        Schema::table('categories', function (Blueprint $table) {

            $table->unique('name')->change();
            $table->unsignedBigInteger('parent_id')->nullable()->change();
            $table->unsignedBigInteger('thumbnail_image')->nullable()->change();
            $table->unsignedBigInteger('icon')->nullable()->change();
            $table->unsignedBigInteger('meta_image')->nullable()->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories');
            $table->foreign('thumbnail_image')->references('id')->on('media_managers');
            $table->foreign('icon')->references('id')->on('media_managers');
            $table->foreign('meta_image')->references('id')->on('media_managers');
        });

        Schema::table('category_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('thumbnail_image')->nullable()->change();
            $table->unsignedBigInteger('meta_image')->nullable()->change();
        });

        Schema::table('category_localizations', function (Blueprint $table) {
            $table->foreign('thumbnail_image')->references('id')->on('media_managers');
            $table->foreign('meta_image')->references('id')->on('media_managers');
            $table->foreign('category_id')->references('id')->on('categories');
        });


        Schema::table('category_brands', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('brand_id')->change();
        });

        Schema::table('category_brands', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('media_managers');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('blogs', function (Blueprint $table) {

            $table->unsignedBigInteger('blog_category_id')->change();
            $table->unsignedBigInteger('thumbnail_image')->change();
            $table->unsignedBigInteger('banner')->nullable()->change();
            $table->unsignedBigInteger('meta_img')->nullable()->change();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
            $table->foreign('thumbnail_image')->references('id')->on('media_managers');
            $table->foreign('banner')->references('id')->on('media_managers');
            $table->foreign('meta_img')->references('id')->on('media_managers');
        });

        Schema::table('blog_localizations', function (Blueprint $table) {

            $table->unsignedBigInteger('blog_id')->change();
        });

        Schema::table('blog_localizations', function (Blueprint $table) {
            $table->foreign('blog_id')->references('id')->on('blogs');
        });

        Schema::table('blog_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_id')->change();
            $table->unsignedBigInteger('tag_id')->change();
        });

        Schema::table('blog_tags', function (Blueprint $table) {
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('tag_id')->references('id')->on('tags');
        });


        Schema::table('products', function (Blueprint $table) {

            $table->unsignedBigInteger('shop_id')->nullable()->change();
            $table->unsignedBigInteger('brand_id')->change();
            $table->unsignedBigInteger('unit_id')->change();
            $table->unsignedBigInteger('thumbnail_image')->change();
            $table->unsignedBigInteger('meta_img')->change();
        });


        Schema::table('products', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('thumbnail_image')->references('id')->on('media_managers');
            $table->foreign('meta_img')->references('id')->on('media_managers');
        });


        Schema::table('product_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
        });

        Schema::table('product_localizations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('category_id')->change();
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('product_taxes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('tax_id')->change();
        });

        Schema::table('product_taxes', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('tax_id')->references('id')->on('taxes');
        });


        Schema::table('product_variations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
        });

        Schema::table('product_variations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('product_variation_stocks', function (Blueprint $table) {

            $table->unsignedBigInteger('product_variation_id')->change();
            $table->unsignedBigInteger('location_id')->change();
        });


        Schema::table('product_variation_stocks', function (Blueprint $table) {
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::table('product_variation_combinations', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('product_variation_id')->change();
            $table->unsignedBigInteger('variation_id')->change();
            $table->unsignedBigInteger('variation_value_id')->change();
        });

        Schema::table('product_variation_combinations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->foreign('variation_id')->references('id')->on('variations');
            $table->foreign('variation_value_id')->references('id')->on('variation_values');
        });


        Schema::table('product_colors', function (Blueprint $table) {

            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('variation_value_id')->change();
            $table->unsignedBigInteger('image')->change();
        });


        Schema::table('product_colors', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('variation_value_id')->references('id')->on('variation_values');
            $table->foreign('image')->references('id')->on('media_managers');
        });


        Schema::table('logistics', function (Blueprint $table) {
            $table->unsignedBigInteger('thumbnail_image')->change();
        });

        Schema::table('logistics', function (Blueprint $table) {
            $table->foreign('thumbnail_image')->references('id')->on('media_managers');
        });

        Schema::table('logistic_zones', function (Blueprint $table) {
            $table->unsignedBigInteger('logistic_id')->change();
        });

        Schema::table('logistic_zones', function (Blueprint $table) {
            $table->foreign('logistic_id')->references('id')->on('logistics');
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->unsignedBigInteger('banner')->nullable()->change();
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreign('banner')->references('id')->on('media_managers');
        });

        Schema::table('campaign_products', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->change();
            $table->unsignedBigInteger('product_id')->change();
        });

        Schema::table('campaign_products', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->unsignedBigInteger('meta_image')->nullable()->change();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('meta_image')->references('id')->on('media_managers');
        });

        Schema::table('page_localizations', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->change();
        });

        Schema::table('page_localizations', function (Blueprint $table) {
            $table->foreign('page_id')->references('id')->on('pages');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->change();
        });

        Schema::table('states', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id')->change();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::table('logistic_zone_cities', function (Blueprint $table) {
            $table->unsignedBigInteger('logistic_id')->change();
            $table->unsignedBigInteger('logistic_zone_id')->change();
            $table->unsignedBigInteger('city_id')->change();
        });

        Schema::table('logistic_zone_cities', function (Blueprint $table) {
            $table->foreign('logistic_id')->references('id')->on('logistics');
            $table->foreign('logistic_zone_id')->references('id')->on('logistic_zones');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('media_managers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        Schema::table('media_managers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('location_id')->change();
            $table->unsignedBigInteger('product_variation_id')->change();
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
        });


        Schema::table('user_addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('country_id')->change();
            $table->unsignedBigInteger('state_id')->change();
            $table->unsignedBigInteger('city_id')->change();
        });

        Schema::table('user_addresses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
        });

        Schema::table('order_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('location_id')->change();
        });

        Schema::table('order_groups', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
        });


        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_group_id')->change();
            $table->unsignedBigInteger('shop_id')->nullable()->change();
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('location_id')->change();
            $table->unsignedBigInteger('logistic_id')->change();
            $table->unsignedBigInteger('deliveryman_id')->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('order_group_id')->references('id')->on('order_groups');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->foreign('logistic_id')->references('id')->on('logistics');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('deliveryman_id')->references('id')->on('users');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->change();
            $table->unsignedBigInteger('product_variation_id')->change();
            $table->unsignedBigInteger('location_id')->change();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->foreign('location_id')->references('id')->on('locations');
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('user_id')->change();
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('order_updates', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->change();
            $table->unsignedBigInteger('user_id')->change();
        });

        Schema::table('order_updates', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('product_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('tag_id')->change();
        });

        Schema::table('product_tags', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedBigInteger('banner')->nullable()->change();
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->foreign('banner')->references('id')->on('media_managers');
        });

        Schema::table('reward_points', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('order_group_id')->change();
        });

        Schema::table('reward_points', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_group_id')->references('id')->on('order_groups');
        });

        Schema::table('wallet_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        Schema::table('wallet_histories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('order_group_id')->change();
            $table->unsignedBigInteger('order_item_id')->change();
            $table->unsignedBigInteger('product_id')->change();
        });


        Schema::table('refunds', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_group_id')->references('id')->on('order_groups');
            $table->foreign('order_item_id')->references('id')->on('order_items');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('blog_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_id')->change();
            $table->unsignedBigInteger('theme_id')->change();
        });

        Schema::table('blog_themes', function (Blueprint $table) {
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('theme_id')->references('id')->on('themes');
        });

        Schema::table('coupon_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('coupon_id')->change();
            $table->unsignedBigInteger('theme_id')->change();
        });

        Schema::table('coupon_themes', function (Blueprint $table) {
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->foreign('theme_id')->references('id')->on('themes');
        });

        Schema::table('campaign_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->change();
            $table->unsignedBigInteger('theme_id')->change();
        });


        Schema::table('campaign_themes', function (Blueprint $table) {
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('theme_id')->references('id')->on('themes');
        });

        Schema::table('category_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->change();
            $table->unsignedBigInteger('theme_id')->change();
        });

        Schema::table('category_themes', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('theme_id')->references('id')->on('themes');
        });

        Schema::table('product_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->change();
            $table->unsignedBigInteger('theme_id')->change();
        });

        Schema::table('product_themes', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('theme_id')->references('id')->on('themes');
        });

        Schema::table('payouts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('payrolls', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('languages', function (Blueprint $table) {
            $table->string('font')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id', 'avatar', 'location_id', 'shop_id']);
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropForeign(['brand_image', 'meta_image']);
        });

        Schema::table('brand_localizations', function (Blueprint $table) {
            $table->dropForeign(['brand_id', 'meta_image']);
        });

        Schema::table('unit_localizations', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
        });

        Schema::table('variation_values', function (Blueprint $table) {
            $table->dropForeign(['variation_id', 'image']);
        });


        Schema::table('variation_localizations', function (Blueprint $table) {
            $table->dropForeign(['variation_id']);
        });


        Schema::table('variation_value_localizations', function (Blueprint $table) {
            $table->dropForeign(['variation_value_id']);
        });

        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'shop_logo']);
        });

        Schema::table('coupons', function (Blueprint $table) {
            $table->dropForeign(['shop_id', 'banner']);
        });

        Schema::table('coupon_usages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id', 'thumbnail_image', 'icon', 'meta_image']);
        });

        Schema::table('category_localizations', function (Blueprint $table) {
            $table->dropForeign(['thumbnail_image', 'category_id', 'meta_image']);
        });

        Schema::table('category_brands', function (Blueprint $table) {
            $table->dropForeign(['brand_id', 'category_id']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['blog_category_id', 'thumbnail_image', 'banner', 'meta_img']);
        });

        Schema::table('blog_localizations', function (Blueprint $table) {
            $table->dropForeign(['blog_id']);
        });

        Schema::table('blog_tags', function (Blueprint $table) {
            $table->dropForeign(['blog_id', 'tag_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['shop_id', 'brand_id', 'unit_id', 'thumbnail_image', 'meta_img']);
        });

        Schema::table('product_localizations', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'category_id']);
        });

        Schema::table('product_taxes', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'tax_id']);
        });

        Schema::table('product_variations', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });


        Schema::table('product_variation_stocks', function (Blueprint $table) {
            $table->dropForeign(['product_variation_id', 'location_id']);
        });


        Schema::table('product_variation_combinations', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'product_variation_id', 'variation_id', 'variation_value_id']);
        });

        Schema::table('product_colors', function (Blueprint $table) {
            $table->dropForeign(['product_id', 'variation_value_id', 'image']);
        });

        Schema::table('logistics', function (Blueprint $table) {
            $table->dropForeign(['thumbnail_image']);
        });

        Schema::table('logistic_zones', function (Blueprint $table) {
            $table->dropForeign(['logistic_id']);
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropForeign(['banner']);
        });

        Schema::table('campaign_products', function (Blueprint $table) {
            $table->dropForeign(['campaign_id', 'product_id']);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['meta_image']);
        });

        Schema::table('page_localizations', function (Blueprint $table) {
            $table->dropForeign(['page_id']);
        });

        Schema::table('states', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
        });

        Schema::table('logistic_zone_cities', function (Blueprint $table) {
            $table->dropForeign(['logistic_id', 'logistic_zone_id', 'city_id']);
        });

        Schema::table('media_managers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'location_id', 'product_variation_id', 'product_id']);
        });

        Schema::table('user_addresses', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'country_id', 'state_id', 'city_id']);
        });

        Schema::table('order_groups', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'location_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign([
                'order_group_id',
                'shop_id',
                'logistic_id',
                'user_id',
                'location_id',
                'deliveryman_id'
            ]);
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign([
                'order_id',
                'product_variation_id',
                'location_id'
            ]);
        });

        Schema::table('wishlists', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'user_id'
            ]);
        });

        Schema::table('order_updates', function (Blueprint $table) {
            $table->dropForeign([
                'order_id',
                'user_id'
            ]);
        });

        Schema::table('product_tags', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'tag_id'
            ]);
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign([
                'banner'
            ]);
        });

        Schema::table('reward_points', function (Blueprint $table) {
            $table->dropForeign([
                'user_id',
                'order_group_id'
            ]);
        });

        Schema::table('wallet_histories', function (Blueprint $table) {
            $table->dropForeign([
                'user_id'
            ]);
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->dropForeign([
                'user_id',
                'order_group_id',
                'order_item_id',
                'product_id'
            ]);
        });

        Schema::table('blog_themes', function (Blueprint $table) {
            $table->dropForeign([
                'blog_id',
                'theme_id'
            ]);
        });
        Schema::table('coupon_themes', function (Blueprint $table) {
            $table->dropForeign([
                'coupon_id',
                'theme_id'
            ]);
        });

        Schema::table('campaign_themes', function (Blueprint $table) {
            $table->dropForeign([
                'campaign_id',
                'theme_id'
            ]);
        });

        Schema::table('category_themes', function (Blueprint $table) {
            $table->dropForeign([
                'category_id',
                'theme_id'
            ]);
        });

        Schema::table('product_themes', function (Blueprint $table) {
            $table->dropForeign([
                'product_id',
                'theme_id'
            ]);
        });

        Schema::table('payouts', function (Blueprint $table) {
            $table->dropForeign([
                'user_id'
            ]);
        });

        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropForeign([
                'user_id'
            ]);
        });
    }
}
