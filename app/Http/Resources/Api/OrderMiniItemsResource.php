<?php

namespace App\Http\Resources\Api;

use App\Models\ProductVariation;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderMiniItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $this->product_variation['product_id'];
        if (isset($this->product_variation->product)) {

            $status = "off";

            if (getSetting('enable_refund_system') == 1)
                if ($this->refundRequest)
                    $status = $this->refundRequest->refund_status;
                else {
                    $withinDays = (int) getSetting('refund_within_days');

                    $checkDate = \Carbon\Carbon::parse($this->created_at)->addDays($withinDays);
                    $today = today();

                    $count = $checkDate->diffInDays($today);

                    if ($count > 0)
                        $status = "request";
                    else
                        $status = 'time over';
                }


            return [
                "id"=>$this->id,
                "product" => new ProductMiniResource($this->product_variation->product),
                "qty" => $this->qty,
                "unit_price" => formatPrice($this->unit_price),
                "total_price" => formatPrice($this->total_price),
                "refund_status" => $status
                //(bool) $this->is_refunded,
            ];
        }
        return;
    }
}
