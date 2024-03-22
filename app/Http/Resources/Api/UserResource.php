<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "balance"=>$this->user_balance,
            "avatar"=>uploadedAsset($this->avatar),
            "is_banned"=>uploadedAsset($this->is_banned)

        ];
    }
    public function with($request)
    {
        return [
            "result" =>true,
            "message"=>"success"
        ];
    }
}
