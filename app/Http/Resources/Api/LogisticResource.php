<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class LogisticResource extends JsonResource
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
            "name"=>$this->logistic->name,
            "logistic_id"=>$this->logistic->id,
            "price"=>formatPrice($this->logisticZone->standard_delivery_charge),
            "image"=>uploadedAsset($this->logistic->thumbnail_image),
        ];
    }
}
