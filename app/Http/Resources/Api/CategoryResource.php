<?php

namespace App\Http\Resources\Api;

use App\Models\ProductCategory;
use Illuminate\Http\Resources\Json\JsonResource;


class CategoryResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->collectLocalization('name'),
            // "products" => ProductCategory::where('category_id', $this->id),
            "products" => ProductCategory::where('category_id', $this->id)->count(),
            "thumbnail_image" => uploadedAsset($this->collectLocalization('thumbnail_image')),
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