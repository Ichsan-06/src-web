<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductBenefit extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'product_benefits';

    protected $fillable = [
        'title',
        'description',
        'product_page_setting_id',
    ];

    protected $appends = ['image'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('image');
    }

    public function productPageSetting()
    {
        return $this->belongsTo(ProductPageSetting::class);
    }
}
