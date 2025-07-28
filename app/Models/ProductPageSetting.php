<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_youtube',
    ];
}
