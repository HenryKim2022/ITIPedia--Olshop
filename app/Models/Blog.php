<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use App\Scopes\ThemeBlogScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['blog_localizations'];

    protected static function booted()
    {
        static::addGlobalScope(new ThemeBlogScope);
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', 1);
    } 
 
    public function collectLocalization($entity = '', $lang_key = '')
    {
        $lang_key = $lang_key ==  '' ? App::getLocale() : $lang_key;
        $blog_localizations = $this->blog_localizations->where('lang_key', $lang_key)->first();
        return $blog_localizations != null && $blog_localizations->$entity ? $blog_localizations->$entity : $this->$entity;
    }

    public function blog_localizations()
    {
        return $this->hasMany(BlogLocalization::class);
    } 

    public function blog_category()
    {
        return $this->hasOne(BlogCategory::class,'id','blog_category_id');
    } 

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class, 'blog_themes', 'blog_id', 'theme_id');
    }

}
