<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticlePageSetting extends Model
{
    protected $table = 'article_page_settings';
    protected $fillable = ['title', 'subtitle'];
}
