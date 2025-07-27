<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'category_products';
    protected $fillable = [
        'name',
        'slug',
    ];

    //Before
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

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
