<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
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
            "code"=>$this->code,
            "name"=>$this->name,
            "symbol"=>$this->symbol,
            "rate"=>(Double)$this->rate,
            "alignment"=>$this->alignment,
            "is_default"=>($this->code == env('DEFAULT_CURRENCY'))
        ];
    }
}
