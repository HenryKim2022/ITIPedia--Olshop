<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
                "id"=>(int) $this->id,
                "user_id"=>(int) $this->user_id,
                "country_id"=>(int) $this->country_id,
                "country_name"=> $this->country->name,
                "state_id"=>(int) $this->state_id,
                "state_name"=> $this->state->name,
                "city_id"=>(int)$this->city_id,
                "city_name"=>$this->city->name,
                "address"=> $this->address,
                "is_default"=>(int) $this->is_default,
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
