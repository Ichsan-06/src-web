<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Before create add value slug
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->slug = str()->slug($model->name);
        });

        //before update add value slug
        static::updating(function ($model) {
            $model->slug = str()->slug($model->name);
        });
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
