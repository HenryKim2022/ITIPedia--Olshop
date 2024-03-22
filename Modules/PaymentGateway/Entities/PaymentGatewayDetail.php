<?php

namespace Modules\PaymentGateway\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentGatewayDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\PaymentGateway\Database\factories\PaymentGatewayDetailFactory::new();
    }
}
