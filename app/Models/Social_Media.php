<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social_Media extends BaseModel
{
    use HasFactory;
    protected $table = 'social_media';

    protected $fillable = [
        'social_media_platform',
        'social_media_url'
    ];
    protected $with = ['file'];
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
