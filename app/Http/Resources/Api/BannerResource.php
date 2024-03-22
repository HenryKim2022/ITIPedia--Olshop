<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            "image"=> uploadedAsset($this->image) ,
            "link"=>$this->link
        ];
    }

}
