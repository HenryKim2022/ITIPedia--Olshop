<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    protected $guarded = [];

    function deliveryman(){
        return $this->belongsTo(User::class,'user_id');
    }
}
