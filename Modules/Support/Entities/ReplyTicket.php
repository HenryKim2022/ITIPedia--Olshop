<?php

namespace Modules\Support\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplyTicket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Support\Database\factories\ReplyTicketFactory::new();
    }
    public function replyImages()
    {
        return $this->hasMany(TicketFile::class, 'replied_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'replied_by', 'id')->withDefault();
    }
}
