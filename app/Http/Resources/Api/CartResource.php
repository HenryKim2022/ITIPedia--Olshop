<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "slug"=>$this->product_variation->product->slug,
            "name"=>$this->product_variation->product->name,
            "quantity"=>$this->qty,
            "thumbnail_image"=>uploadedAsset($this->product_variation->product->thumbnail_image),
            "unit"=>$this->product_variation->product->unit->name??"",
            "price"=>apiProductPrice($this->product_variation->product),
            "category"=> $this->product_variation->product->categories->first()->name
        ];
    }
}
