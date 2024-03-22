<?php

use App\Models\Coupon;
use App\Models\CouponTheme;
use App\Scopes\ThemeCouponScope;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AssignExistingCouponsToDefaultTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(Schema::hasTable('themes') && Schema::hasTable('coupons')){ 
            $coupons = Coupon::withoutGlobalScope(ThemeCouponScope::class)->get();
            $data = [];
            foreach ($coupons as $coupon) {
                $tempArr = [
                    'coupon_id' => $coupon->id,
                    'theme_id' => 1,
                ];
                array_push($data, $tempArr);
            }

            if(!empty($data)){
                CouponTheme::insert($data);
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
         
    }
}
