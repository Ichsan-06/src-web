<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeSetting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'logo',
        'favicon',
        'video_1',
        'registered_shop',
        'wholesale_partners',
        'paguyuban_src',
        'bumn_partner',
        'total_province',
    ];

    protected $appends = [
        'logo',
        'favicon',
        'video_1',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->singleFile();

        $this->addMediaCollection('favicon')
            ->singleFile();

        $this->addMediaCollection('video_1')
            ->singleFile();
    }

    public function getLogoAttribute()
    {
        return $this->getFirstMediaUrl('logo');
    }

    public function getFaviconAttribute()
    {
        return $this->getFirstMediaUrl('favicon');
    }

    public function getVideo1Attribute()
    {
        return $this->getFirstMediaUrl('video_1');
    }
}
