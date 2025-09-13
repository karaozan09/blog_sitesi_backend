<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_Media extends BaseModel
{
    use HasFactory;
    protected $table = 'social_media';

    protected $fillable = [
        'social_media_platform',
        'social_media_icon',
        'social_media_url'
    ];
}
