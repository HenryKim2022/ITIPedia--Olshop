<?php

namespace Modules\Support\Entities;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Support\Entities\TicketCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Support\Database\factories\TicketFactory::new();
    }
    public function images()
    {
        return $this->hasMany(TicketFile::class, 'ticket_id', 'id')->whereNull('replied_id');
    }
    public function assigStaffs()
    {
        return $this->hasMany(AssignTicket::class, 'ticket_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(ReplyTicket::class, 'ticket_id', 'id')->orderBy('id', 'DESC');
    }
    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'category_id', 'id')->withDefault([
            'name'=>'n/a'
        ]);
    }
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id')->withDefault([
            'name'=>'n/a'
        ]);
    }
    public function getAttributeShortDescription($key)
    {
        return Str::limit($this->description, 20 );
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault([
            'name'=>'n/a'
        ]);
    }

}
