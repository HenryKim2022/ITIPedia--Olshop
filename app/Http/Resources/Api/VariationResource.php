<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class VariationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "product_id"=> $this->product_id,
            "product_name"=> $this->product->name,
            "product_img"=> $this->product->thumbnail_image,
            "stock"=>$this->product_variation_stock ? (int) $this->product_variation_stock->stock_qty : 0,
            "variation_key"=> $this->variation_key,
            "sku"=> $this->sku,
            "code"=>  $this->code,
            "price"=>formatPrice($this->price,false,false,true),
        ];
    }

}
