<?php

namespace Modules\Support\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Support\Database\factories\TicketCategoryFactory::new();
    }
    public function staff():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault([
            'name'=>'not found'
        ]);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'category_id', 'id');
    }
}
