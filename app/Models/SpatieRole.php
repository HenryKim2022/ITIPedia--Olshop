<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class SpatieRole extends Role
{
    protected $table = ['roles'];
    use HasFactory;
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name' => 'Default'
        ]);
    }

    public function scopeIsActive($query)
    {
        return $query->where('name', '!=', 'Super Admin')->where('is_active', 1)->when(auth()->user()->user_type != 'admin', function ($q) {
            $q->where('created_by', auth()->user()->id)->where('is_system', '!=', 1);
        })->orWhere('id', auth()->user()->role_id)->where('name', '!=', 'Super Admin');
    }
}
