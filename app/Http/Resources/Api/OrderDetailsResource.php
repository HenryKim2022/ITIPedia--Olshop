<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"=>(Integer)$this->id,
            "order_code"=>getSetting('order_code_prefix').$this->order_code ,
            "date"=>date('d M, Y', strtotime($this->created_at)),
            "shipping_address"=>new AddressResource($this->shippingAddress),
            "billing_address"=>new AddressResource($this->billingAddress),
            "items"=> OrderMiniItemsResource::collection($this->order->orderItems),
            "status"=>$this->order->delivery_status,
            "payment_method"=>ucwords(str_replace('_', ' ', $this->payment_method)),
            "sub_total_amount"=>formatPrice($this->sub_total_amount),
            "total_tips"=>formatPrice($this->total_tips_amount),
            "total_shipping_cost"=>formatPrice($this->total_shipping_cost),
            "coupon_discount_amount"=>formatPrice($this->total_coupon_discount_amount),
            "total_price"=>formatPrice($this->grand_total_amount),
        ];
    }
}
