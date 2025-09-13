<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'background_image',
        'footer_title',
        'footer_text',
        'email',
        'phone_number',
        'address'
    ];
}
