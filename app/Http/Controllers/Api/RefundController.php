<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\Api\RefundResource;
use App\Models\OrderItem;
use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()->refunds()->latest()->paginate(paginationNumber());
        return RefundResource::collection($wallets);
    }

    # submit refund request
    public function store(Request $request)
    {
        $orderItem = OrderItem::where('id', $request->order_item_id)->first();

        $refund = new Refund;
        $refund->user_id = auth()->user()->id;
        $refund->order_group_id = $orderItem->order->orderGroup->id;
        $refund->order_item_id  = $orderItem->id;

        $product = $orderItem->product_variation->product;
        $refund->product_id  = $product->id;

        $refund->order_payment_status  = $orderItem->order->orderGroup->payment_status;
        $refund->refund_reason  = $request->refund_reason;
        $refund->save();

       return $this->success(localize('Refund request has been submitted'));
         
    }
}
