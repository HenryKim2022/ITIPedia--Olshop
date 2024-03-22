<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Ramsey\Uuid\Type\Integer;

class LanguageResource extends JsonResource
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
            "id" => (int)$this->id,
            "name" => $this->name,
            "flag" => staticAssetApi('backend/assets/img/flags/' . $this->flag . '.png'),
            "code" => $this->code,
            "is_rtl" => $this->is_rtl,
            "is_active" => $this->is_active,
        ];
    }
}
