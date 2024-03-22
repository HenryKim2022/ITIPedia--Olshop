<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductMiniResource extends JsonResource
{

    public function with($request)
    {
        return [
            "result" =>true,
            "message"=>"success"
        ];
    }

    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            "name"=>$this->name,
            "slug"=>$this->slug,
            "brand"=>$this->brand->name,
            "unit"=>$this->unit->name??"",
            "thumbnail_image"=>uploadedAsset($this->thumbnail_image),
            "price"=>apiProductPrice($this),
            "is_discounted"=>productBasePrice($this) != discountedProductBasePrice($this),
            "discount"=>discountPercentage($this),
            "reward_points"=>$this->reward_points,
            "categories"=> CategoryResource::collection($this->categories),
            "variations"=>VariationResource::collection($this->variations),
        ];
    }
}
