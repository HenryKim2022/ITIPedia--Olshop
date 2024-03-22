<?php

namespace Modules\PaymentGateway\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\PaymentGateway\Database\factories\PaymentGatewayFactory::new();
    }
    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1)->where('is_show', 1);
    }
}
