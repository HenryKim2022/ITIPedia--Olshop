<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\DB;
use Nwidart\Modules\Facades\Module;

class TestController extends Controller
{
   public function index()
   {
    $users = User::whereNull('shop_id')->update(['shop_id'=>1]);
    $coupons = Coupon::whereNull('shop_id')->update(['shop_id'=>1]);
    $products = Product::whereNull('shop_id')->update(['shop_id'=>1]);
    $orders = Order::whereNull('shop_id')->update(['shop_id'=>1]);
    
      SystemSetting::updateOrCreate([
         'entity'=>'software_version'
     ], [
         'value'=> '4.2.0'
     ]);

     SystemSetting::updateOrCreate([
         'entity'=>'last_update'
     ], [
         'value'=> Carbon::now()]
     );
   }
}
