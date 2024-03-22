<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\OrderItem;
use App\Models\ProductVariation;
use PayPalCheckoutSdk\Orders\OrdersValidateRequest;

class OrderMiniResource extends JsonResource
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
            "id"=>$this->id,
            "items"=>new OrderMiniItemsResource($this->orderItems->first()),
            "status"=>$this->delivery_status,
            "date"=>$this->created_at,
        ];
    }
}
