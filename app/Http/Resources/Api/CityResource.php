<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            "state_id"=>(int)$this->state_id,
            "id"=>$this->id,
            "name"=>$this->name,
            "is_active"=>(boolean)$this->is_active
        ];
    }
}
