<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class RefundResource extends JsonResource
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
            'id'=>(Integer)$this->id,
            'order_code'=> getSetting('order_code_prefix') . $this->orderGroup->order_code,
            'amount'=>formatPrice($this->orderItem->total_price),
            'product_name'=>$this->orderItem->product_variation->product->collectLocalization('name'),
            'status'=>$this->refund_status,
            'reson'=>$this->refund_reject_reason,
            'date'=>date('d M, Y', strtotime($this->created_at)),
        ];
    }
}
