<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CartResource;
use App\Http\Resources\Api\CouponResource;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::where('end_date', '>=', strtotime(date('Y-m-d')))
        ->latest()
        ->get();

        return CouponResource::collection($coupons);
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

    # apply coupon
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        if ($coupon) {
            $date = strtotime(date('d-m-Y H:i:s'));

            # check if coupon is not expired
            if ($coupon->start_date <= $date && $coupon->end_date >= $date) {

                $carts  = Cart::where('user_id', auth()->user()->id)->where('location_id', request()->header("Stock-Location-Id"))->get();


                # check min spend
                $subTotal = (float) getSubTotal($carts, false);
                if ($subTotal >= (float) $coupon->min_spend) {

                    # check if coupon is for categories or products
                    if ($coupon->product_ids || $coupon->category_ids) {
                        if ($carts && validateCouponForProductsAndCategories($carts, $coupon)) {
                            # SUCCESS:: can apply coupon
                            // setCoupon($coupon);
                            // return $this->success(localize('Coupon applied successfully'));
                            return $this->getCartsInfo(localize('Coupon applied successfully'), true, $coupon->code);
                        }

                        # coupon not valid for your cart items
                        // removeCoupon();
                        // return $this->couponApplyFailed(localize('Coupon is only applicable for selected products or categories'));
                        return $this->couponApplyFailed(localize('Coupon is only applicable for selected products or categories'));
                    }

                    # SUCCESS::can apply coupon - not product or category based
                    // setCoupon($coupon);
                    return $this->getCartsInfo(localize('Coupon applied successfully'), true, $coupon->code);
                }

                # min spend
                //    removeCoupon();
                return $this->couponApplyFailed('Please shop for atleast ' . formatPrice($coupon->min_spend));
            }

            # expired
            //    removeCoupon();
            return $this->couponApplyFailed(localize('Coupon is expired'));
        }

        // coupon not found
        //    removeCoupon();
        return $this->couponApplyFailed(localize('Coupon is not valid'));
    }


    # coupon apply failed
    private function couponApplyFailed($message = '', $success = false)
    {
        $response = $this->getCartsInfo($message, false);
        $response['result'] = $success;
        return $response;
    }

    # clear coupon
    public function clearCoupon()
    {
        return $this->couponApplyFailed(localize('Coupon has been removed'), true);
    }

    # get cart information
    private function getCartsInfo($message = '', $couponDiscount = true, $couponCode = '')
    {
        $carts          = Cart::where('user_id', auth()->user()->id)->where('location_id', request()->header("Stock-Location-Id"))->get();

        return [
            'result'           => true,
            'message'           => $message,
            'carts'             => CartResource::collection($carts),
            'total'          => formatPrice(getSubTotal($carts, $couponDiscount, $couponCode)),
            'cartCount'         => count($carts),
            'subTotal'           => formatPrice(getSubTotal($carts, false, "")),
            'couponDiscount'    => formatPrice(getCouponDiscount(getSubTotal($carts, false), $couponCode)),
        ];
    }
}
