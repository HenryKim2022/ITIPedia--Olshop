<?php

namespace App\Models;

use App\Scopes\ThemeCampaignScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new ThemeCampaignScope);
    }

    public function campaignProducts()
    {
        return $this->hasMany(CampaignProduct::class);
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'campaign_themes', 'campaign_id', 'theme_id');
    }
}
