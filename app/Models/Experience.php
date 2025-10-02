<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'experience_name',
        'company_name',
        'experience_description',
        'start_date',
        'end_date',
        'experience_image'
    ];
}
