<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'content',
    ];

    protected $appends = ['tags_name'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }


    // add atribute getTags with sperator ,
    public function getTagsNameAttribute()
    {
        return $this->tags->pluck('name')->implode(', ');
    }

    public function tags()
    {
        return $this->hasMany(ArticleTag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
