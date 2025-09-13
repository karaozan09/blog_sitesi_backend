<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Article extends BaseModel
{
    use HasUuids;

    protected $fillable = [
        'article_title',
        'article_content',
        'slug',
        'article_date'
    ];
}
