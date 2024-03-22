<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogisticZone extends Model
{
    use HasFactory, SoftDeletes;

    public function logistic()
    {
        return $this->belongsTo(Logistic::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class, 'logistic_zone_cities', 'logistic_zone_id', 'city_id');
    }
}
