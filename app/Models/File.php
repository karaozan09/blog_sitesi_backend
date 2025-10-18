<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasUuids;
    protected $fillable = [
        'file_path',
        'original_name',
        'mime_type',
        'size',
    ];
    public function fileable()
    {
        return $this->morphTo();
    }
}
