<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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

            "id"=> $this->id,
            "shop_id"=> $this->shop_id,
            "banner"=> uploadedAsset($this->banner),
            "code"=> $this->code,
            "discount_type"=> $this->discount_type,
            "discount_value"=>$this->discount_type =="flat"? formatPrice($this->discount_value):$this->discount_value,
            "is_free_shipping"=> $this->is_free_shipping,
            "start_date"=> $this->start_date,
            "end_date"=> $this->end_date,
            "min_spend"=> $this->min_spend,
            "max_discount_amount"=> $this->max_discount_amount,
            "customer_usage_limit"=> $this->customer_usage_limit,
            "product_ids"=> $this->product_ids,
            "category_ids"=> $this->category_ids
        ];
    }
}
