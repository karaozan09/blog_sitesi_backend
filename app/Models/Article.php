<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Article extends BaseModel
{
    use HasUuids;

    protected $fillable = [
        'article_title',
        'article_content',
        'article_url',
        'slug',
        'article_date'
    ];
    protected $with = ['file'];
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
