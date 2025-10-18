<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'footer_title',
        'footer_text',
        'email',
        'phone_number',
        'address'
    ];
    protected $with = ['files'];
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
