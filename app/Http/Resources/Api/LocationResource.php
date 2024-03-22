<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public function with($request)
     {
         return [
             'result' => true,
             'status' => 200
         ];
     }

    public function toArray($request)
    {
        return [
            "id"=>$this->id ,
            "name"=>$this->name,
            "image"=> uploadedAsset($this->banner) ,
            "address"=>$this->address,
            "lat"=>$this->latitude,
            "lng"=>$this->longitude,
            "is_default"=>$this->is_default==1,
        ];
    }

}
