<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            "variations"=>
            //$this->variations,
             VariationResource::collection($this->variations),
            "variation_materials"=>generateVariationOptions($this->variation_combinations),
            "slug"=>$this->slug,
            "name"=>$this->collectLocalization('name'),
            "thumbnail_image"=>uploadedAsset($this->thumbnail_image),
            "gallery_images"=>uploadedAssetes($this->gallery_images),
            "price"=>apiProductPrice($this),
            "main_price"=>productBasePrice($this),
            "is_discounted"=>productBasePrice($this) != discountedProductBasePrice($this),
            "discount"=>discountPercentage($this),
            "short_description"=>$this->collectLocalization('short_description'),
            "description"=>$this->collectLocalization('description'),
            "brand"=>$this->brand->name,
            "unit"=>$this->unit->name,
            "stock"=>productStock($this),
            "reward_points"=>$this->reward_points,
            "categories"=> CategoryResource::collection($this->categories),
            //"reviews"=> Review::
        ];
    }

    public function with($request)
    {
        return [
            'result' => true,
            'status' => 200
        ];
    }
}
