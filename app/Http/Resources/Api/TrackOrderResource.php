<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackOrderResource extends JsonResource
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
            'id'=>(Integer)$this->id??0,
            "order_updates"=>OrderUpdateResource::collection($this->orderUpdates)??null,
            'created_date'=>date('d M, Y', strtotime($this->created_at))??null,
        ];
    }
}
