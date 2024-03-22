<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Expr\Cast\Double;
use Ramsey\Uuid\Type\Integer;

class WalletResource extends JsonResource
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
            'id'=>(Integer)$this->id,
            'amount'=>formatPrice($this->amount),
            'payment_method'=>$this->payment_method,
            'status'=>$this->status,
            'date'=>date('d M, Y', strtotime($this->created_at)),
        ];
    }
}
