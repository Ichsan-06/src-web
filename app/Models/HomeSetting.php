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
        'company_name',
        'company_description',
        'company_address',
        'company_phone',
        'company_email',
        'whatsapp',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'latitude',
        'longitude',
        'logo',
        'favicon',

        //Section 1
        'section_1_title',
        'section_1_sub_title',
        'section_1_description',

        //Section 2
        'section_2_title',
        'section_2_sub_title',
        'section_2_banner',

        //Section 3
        'section_3_title',
        'section_3_sub_title',
        'video_1',
        'registered_shop',
        'wholesale_partners',
        'paguyuban_src',
        'bumn_partner',
        'total_province',

        //Section 4
        'section_4_title',
        'section_4_sub_title',

        //Section 5
        'section_5_title',
        'section_5_sub_title',
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

    public function homeSliders()
    {
        return $this->hasMany(HomeSlider::class);
    }

    public function homeSection4s()
    {
        return $this->hasMany(HomeSection4::class);
    }
}
