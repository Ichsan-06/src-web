<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'category_id',
        'unit_type',
    ];

    // Before
    protected static function booted(): void
    {
        parent::booted();

        static::deleting(function ($model) {
            $model->media()->delete();
        });

        static::creating(function ($model) {
            $model->slug = str()->slug($model->name);
        });

        //before update add value slug
        static::updating(function ($model) {
            $model->slug = str()->slug($model->name);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
