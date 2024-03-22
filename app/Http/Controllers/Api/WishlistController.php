<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\WishListResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    # customer's wishlist
    public function index()
    {
        $wishlist = auth()->user()->wishlist;
        return WishListResource::collection($wishlist);
    }

    # add to wishlist
    public function check($id)
    {

        $wishlist =   auth()->user()->wishlist()->where('product_id', $id)->first();

        if ($wishlist) {
            return $this->success(localize('This product found in wishlists'));
        }else{
            return $this->failed(localize('This product not found in wishlists'));
        }
    }

    # add to wishlist
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $wishlist = Wishlist::where('user_id', $userId)->where('product_id', $request->product_id)->count();

        if ($wishlist < 1) {
            $wishlist = new Wishlist;
            $wishlist->user_id = $userId;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
        }


        return $this->success(localize("Product added to your wishlist"));
    }

    # delete wishlist
    public function delete($id)
    {
        try {
            auth()->user()->wishlist()->where('product_id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $this->success(localize('Product has been removed from your wishlist'));
    }
}
