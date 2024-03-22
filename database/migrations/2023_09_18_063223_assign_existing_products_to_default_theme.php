<?php

use App\Models\Product;
use App\Models\ProductTheme;
use App\Scopes\ThemeProductScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignExistingProductsToDefaultTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('themes') && Schema::hasTable('products')){ 
            $products = Product::withoutGlobalScope(ThemeProductScope::class)->get(); 
            $data = [];
            foreach ($products as $product) {
                $tempArr = [
                    'product_id' => $product->id,
                    'theme_id' => 1,
                ];
                array_push($data, $tempArr);
            }  
            if(!empty($data)){
                ProductTheme::insert($data);
            }
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('default_theme', function (Blueprint $table) {
            //
        });
    }
}
